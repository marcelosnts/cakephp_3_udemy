<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ContactMsgs Controller
 *
 * @property \App\Model\Table\ContactMsgsTable $ContactMsgs
 *
 * @method \App\Model\Entity\ContactMsg[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactMsgsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ContsMsgsSits', 'ContsMsgsSits.Colors'],
            'order' => ['ContactMsgs.id' => 'DESC']
        ];
        $contactMsgs = $this->paginate($this->ContactMsgs);

        $this->set(compact('contactMsgs'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Msg id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactMsgsTable = TableRegistry::get('ContactMsgs');
        $contactMsgPendente = $contactMsgsTable->getMsgSit($id);

        if($contactMsgPendente){
            $contactMsgs = $contactMsgsTable->newEntity();
            $contactMsgs->id = $id;
            $contactMsgs->conts_msgs_sit_id = 1;

            $contactMsgsTable->save($contactMsgs);
        }

        $contactMsg = $this->ContactMsgs->get($id, [
            'contain' => ['Users', 'ContsMsgsSits', 'ContsMsgsSits.Colors']
        ]);

        $this->set('contactMsg', $contactMsg);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactMsg = $this->ContactMsgs->newEntity();
        if ($this->request->is('post')) {
            $contactMsg = $this->ContactMsgs->patchEntity($contactMsg, $this->request->getData());
            if ($this->ContactMsgs->save($contactMsg)) {
                $this->Flash->success(__('The contact msg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact msg could not be saved. Please, try again.'));
        }
        $users = $this->ContactMsgs->Users->find('list', ['limit' => 200]);
        $contsMsgsSits = $this->ContactMsgs->ContsMsgsSits->find('list', ['limit' => 200]);
        $this->set(compact('contactMsg', 'users', 'contsMsgsSits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Msg id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactMsg = $this->ContactMsgs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactMsg = $this->ContactMsgs->patchEntity($contactMsg, $this->request->getData());
            if ($this->ContactMsgs->save($contactMsg)) {
                $this->Flash->success(__('The contact msg has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact msg could not be saved. Please, try again.'));
        }
        $users = $this->ContactMsgs->Users->find('list', ['limit' => 200]);
        $contsMsgsSits = $this->ContactMsgs->ContsMsgsSits->find('list', ['limit' => 200]);
        $this->set(compact('contactMsg', 'users', 'contsMsgsSits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Msg id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactMsg = $this->ContactMsgs->get($id);
        if ($this->ContactMsgs->delete($contactMsg)) {
            $this->Flash->success(__('The contact msg has been deleted.'));
        } else {
            $this->Flash->error(__('The contact msg could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
