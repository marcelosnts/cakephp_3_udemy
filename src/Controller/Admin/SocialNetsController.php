<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * SocialNets Controller
 *
 * @property \App\Model\Table\SocialNetsTable $SocialNets
 *
 * @method \App\Model\Entity\SocialNet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SocialNetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations', 'Situations.Colors']
        ];
        $socialNets = $this->paginate($this->SocialNets);

        $this->set(compact('socialNets'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Net id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialNet = $this->SocialNets->get($id, [
            'contain' => ['Situations', 'Situations.Colors']
        ]);

        $this->set('socialNet', $socialNet);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialNet = $this->SocialNets->newEntity();
        if ($this->request->is('post')) {
            $socialNet = $this->SocialNets->patchEntity($socialNet, $this->request->getData());
            if ($this->SocialNets->save($socialNet)) {
                $this->Flash->success(__('The social net has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social net could not be saved. Please, try again.'));
        }
        $situations = $this->SocialNets->Situations->find('list', ['limit' => 200]);
        $this->set(compact('socialNet', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Net id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialNet = $this->SocialNets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialNet = $this->SocialNets->patchEntity($socialNet, $this->request->getData());
            if ($this->SocialNets->save($socialNet)) {
                $this->Flash->success(__('The social net has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social net could not be saved. Please, try again.'));
        }
        $situations = $this->SocialNets->Situations->find('list', ['limit' => 200]);
        $this->set(compact('socialNet', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Net id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialNet = $this->SocialNets->get($id);
        if ($this->SocialNets->delete($socialNet)) {
            $this->Flash->success(__('The social net has been deleted.'));
        } else {
            $this->Flash->error(__('The social net could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
