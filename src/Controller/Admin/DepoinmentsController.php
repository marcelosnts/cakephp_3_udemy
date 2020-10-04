<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Depoinments Controller
 *
 * @property \App\Model\Table\DepoinmentsTable $Depoinments
 *
 * @method \App\Model\Entity\Depoinment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepoinmentsController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id Depoinment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $depoinment = $this->Depoinments->get($id, [
            'contain' => []
        ]);

        $this->set('depoinment', $depoinment);
    }

    /**
     * Edit method
     *
     * @param string|null $id Depoinment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $depoinment = $this->Depoinments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $depoinment = $this->Depoinments->patchEntity($depoinment, $this->request->getData());
            if ($this->Depoinments->save($depoinment)) {
                $this->Flash->success(__('The depoinment has been saved.'));

                return $this->redirect(['action' => 'view', '1']);
            }
            $this->Flash->error(__('The depoinment could not be saved. Please, try again.'));
        }
        $this->set(compact('depoinment'));
    }
}
