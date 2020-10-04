<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        $this->Auth->allow(['signup', 'logout', 'confirmation', 'passwordRecovery', 'resetPassword']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function profile()
    {
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            $this->Flash->danger(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    use MailerAwareTrait;
    public function signup(){
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->cod_valid_email = Security::hash($this->request->getData('password') . $this->request->getData('email'), 'sha256', false);
            if ($this->Users->save($user)) {
                $user->host_name = Router::fullBaseUrl() . $this->request->getAttribute('webroot') . $this->request->getParam('prefix');

                $this->Flash->success(__('The user has been saved.'));

                $this->getMailer('User')->send('signupUser', [$user]);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->danger(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function confirmation($cod_valid_email = null){
        $userTable = TableRegistry::get('Users');

        $emailConfirmation = $userTable->getEmailConfirmation($cod_valid_email);

        if($emailConfirmation){
            $user = $this->Users->newEntity();

            $user->id = $emailConfirmation->id;
            $user->email_valid = '1';

            if($userTable->save($user)){
                $this->Flash->success(__('Email validated!'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }else{
                $this->Flash->danger(__('User cannot be validated. Please try again later'));

                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        }else {
            $this->Flash->danger(__('The code was not found.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
            }
            $this->Flash->danger(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function changeUserPic($id = null){
        $user = $this->Users->get($id);
        $oldImage = $user->image;

        if($this->request->is(['patch', 'put', 'post'])){
            $user = $this->Users->newEntity();
            $user->id = $id;
            $user->image = $this->Users->slugUploadImgRed($this->request->getData()['image']['name']);

            if($this->Users->save($user)){
                $path = WWW_ROOT . "files" . DS . "user" . DS . $id . DS;
                $newImage = $this->request->getData()['image'];
                $newImage['name']=  $user->image;

                if($this->Users->uploadImgRed($newImage, $path, 150, 150)){
                    $this->Users->deleteOldFile($path, $oldImage, $newImage);

                    $this->Flash->success(__('Picture updated!'));

                    return $this->redirect(['controller' => 'Users', 'action' => 'view', $id]);
                }else{
                    $user->image = $oldImage;

                    $this->Users->save($user);

                    $this->Flash->danger(__('Something went wrong. Try again!'));
                }
            }else {
                $this->Flash->danger(__('Something went wrong. Try again!'));
            }
        }

        $this->set(compact('user'));
    }


    public function editProfile(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
                    'contain' => []
                ]);

        if($this->request->is(['patch', 'put', 'post'])){
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)){
                $this->Flash->success(__('Profile updated successfully!'));

                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
            }else{
                $this->Flash->danger(__('Something went wrong. Try again!'));
            }
        }

        $this->set(compact('user'));
    }

    public function passwordRecovery(){
        $user = $this->Users->newEntity();

        if($this->request->is('post')){
            $userTable = TableRegistry::get('Users');

            $recPassword = $userTable->passwordRecovery($this->request->getData()['email']);

            if($recPassword){
                if($recPassword->password_recovery == ""){
                    $user->id = $recPassword->id;
                    $user->password_recovery = Security::hash($this->request->getData()['email'] . $recPassword->id . date('Y/m/d H:i:s'), 'sha256', false);
                    $user->email = $this->request->getData()['email'];

                    if($userTable->save($user)){
                        $this->Flash->success(__('Recovery procedure was sent to your email.'));

                        $user->host_name = Router::fullBaseUrl() . $this->request->getAttribute('webroot') . $this->request->getParam('prefix');

                        $this->getMailer('User')->send('passwordRecovery', [$user]);

                        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }
                }
            }else{
                $this->Flash->danger(__('User not found.'));
            }
        }

        $this->set(compact('user'));
    }

    public function resetPassword($password_recovery = null){
        $userTable = TableRegistry::get('Users');
        $user = $this->Users->newEntity();
        $resPassword = $userTable->getPasswordRecovery($password_recovery);

        if($resPassword){
            if($this->request->is(['post', 'patch', 'put'])){
                $user = $this->Users->patchEntity($resPassword, $this->request->getData());
                $user->password_recovery = null;

                if($userTable->save($user)){
                    $this->Flash->success(__('Password Reset!'));

                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }else {
                    $this->Flash->danger(__('Something went wrong! Try again!'));
                }
            }
        }else{
            $this->Flash->danger(__('Something went wrong! Try again!'));

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->set(compact('user'));
    }

    public function editPassword($id = null){
        $user = $this->Users->get($id, [
                    'contain' => []
                ]);

        if($this->request->is(['patch', 'put', 'post'])){
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)){
                $this->Flash->success(__('User Password has been updated!'));

                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }else{
                $this->Flash->danger(__('Something went wrong. Try again!'));
            }
        }

        $this->set(compact('user'));
    }

    public function editProfilePassword(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id, [
                    'contain' => []
                ]);

        if($this->request->is(['patch', 'put', 'post'])){
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)){
                $this->Flash->success(__('Password updated!'));

                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
            }else{
                $this->Flash->danger(__('Something went wrong. Try again!'));
            }
        }

        $this->set(compact('user'));
    }

    public function changeProfilePic(){
        $user_id = $this->Auth->user('id');
        $user = $this->Users->get($user_id);
        $oldImage = $user->image;

        if($this->request->is(['patch', 'put', 'post'])){
            $user = $this->Users->newEntity();
            $user->id = $user_id;
            $user->image = $this->Users->slugUploadImgRed($this->request->getData()['image']['name']);

            if($this->Users->save($user)){
                $path = WWW_ROOT . "files" . DS . "user" . DS . $user_id . DS;
                $newImage = $this->request->getData()['image'];
                $newImage['name']=  $user->image;

                if($this->Users->uploadImgRed($newImage, $path, 150, 150)){
                    $this->Users->deleteOldFile($path, $oldImage, $newImage);

                    $this->Flash->success(__('Picture updated!'));

                    return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
                }else{
                    $user->image = $oldImage;

                    $this->Users->save($user);

                    $this->Flash->danger(__('Something went wrong. Try again!'));
                }
            }else {
                $this->Flash->danger(__('Something went wrong. Try again!'));
            }
        }

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        $path = WWW_ROOT . "files" . DS . "user" . DS . $user->id . DS;

        $this->Users->deleteFiles($path);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->danger(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            }else {
                $this->Flash->danger(__('Username or password incorrect!'));
            }
        }
    }

    public function logout() {
        $this->Flash->success(__('Logout successfully!'));
        return $this->redirect($this->Auth->logout());
    }
}
