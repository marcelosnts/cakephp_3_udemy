<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;

/**
 * Contact Controller
 *
 * @property \App\Model\Table\UsersTable $Contact
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    use MailerAwareTrait;
    public function index()
    {
        $contactMsgsTable = TableRegistry::get('ContactMsgs');
        $contactMsg = $contactMsgsTable->newEntity();

        if($this->request->is('post')){
            $contactMsg = $contactMsgsTable->patchEntity($contactMsg, $this->request->getData());
            $contactMsg->conts_msgs_sit_id = 2;

            if($contactMsgsTable->save($contactMsg)){
                $this->getMailer('Contact')->send('newContactMessage', [$contactMsg]);

                $contactMsg->email_adm = 'contact@escola.com';
                $this->getMailer('Contact')->send('newContactMessageAdmin', [$contactMsg]);

                $this->Flash->success(__('Message sent!'));

                $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->danger(__('Cannot send your message!'));
            }
        }

        $this->set(compact('contactMsg'));
    }
}
