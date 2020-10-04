<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ContsMsgsSits Controller
 *
 * @property \App\Model\Table\ContsMsgsSitsTable $ContsMsgsSits
 *
 * @method \App\Model\Entity\ContsMsgsSit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContsMsgsSitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Colors']
        ];
        $contsMsgsSits = $this->paginate($this->ContsMsgsSits);

        $this->set(compact('contsMsgsSits'));
    }

    /**
     * View method
     *
     * @param string|null $id Conts Msgs Sit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contsMsgsSit = $this->ContsMsgsSits->get($id, [
            'contain' => ['Colors', 'ContactMsgs']
        ]);

        $this->set('contsMsgsSit', $contsMsgsSit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contsMsgsSit = $this->ContsMsgsSits->newEntity();
        if ($this->request->is('post')) {
            $contsMsgsSit = $this->ContsMsgsSits->patchEntity($contsMsgsSit, $this->request->getData());
            if ($this->ContsMsgsSits->save($contsMsgsSit)) {
                $this->Flash->success(__('The conts msgs sit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conts msgs sit could not be saved. Please, try again.'));
        }
        $colors = $this->ContsMsgsSits->Colors->find('list', ['limit' => 200]);
        $this->set(compact('contsMsgsSit', 'colors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conts Msgs Sit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contsMsgsSit = $this->ContsMsgsSits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contsMsgsSit = $this->ContsMsgsSits->patchEntity($contsMsgsSit, $this->request->getData());
            if ($this->ContsMsgsSits->save($contsMsgsSit)) {
                $this->Flash->success(__('The conts msgs sit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conts msgs sit could not be saved. Please, try again.'));
        }
        $colors = $this->ContsMsgsSits->Colors->find('list', ['limit' => 200]);
        $this->set(compact('contsMsgsSit', 'colors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conts Msgs Sit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contsMsgsSit = $this->ContsMsgsSits->get($id);
        if ($this->ContsMsgsSits->delete($contsMsgsSit)) {
            $this->Flash->success(__('The conts msgs sit has been deleted.'));
        } else {
            $this->Flash->error(__('The conts msgs sit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
