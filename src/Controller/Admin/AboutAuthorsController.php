<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AboutAuthors Controller
 *
 * @property \App\Model\Table\AboutAuthorsTable $AboutAuthors
 *
 * @method \App\Model\Entity\AboutAuthor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutAuthorsController extends AppController
{
    /**
     * Edit method
     *
     * @param string|null $id About Author id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aboutAuthor = $this->AboutAuthors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutAuthor = $this->AboutAuthors->patchEntity($aboutAuthor, $this->request->getData());
            if ($this->AboutAuthors->save($aboutAuthor)) {
                $this->Flash->success(__('The about author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about author could not be saved. Please, try again.'));
        }
        $situations = $this->AboutAuthors->Situations->find('list', ['limit' => 200]);
        $this->set(compact('aboutAuthor', 'situations'));
    }
}
