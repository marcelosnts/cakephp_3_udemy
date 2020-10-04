<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArticlesCats Controller
 *
 * @property \App\Model\Table\ArticlesCatsTable $ArticlesCats
 *
 * @method \App\Model\Entity\ArticlesCat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesCatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations']
        ];
        $articlesCats = $this->paginate($this->ArticlesCats);

        $this->set(compact('articlesCats'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Cat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesCat = $this->ArticlesCats->get($id, [
            'contain' => ['Situations']
        ]);

        $this->set('articlesCat', $articlesCat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesCat = $this->ArticlesCats->newEntity();
        if ($this->request->is('post')) {
            $articlesCat = $this->ArticlesCats->patchEntity($articlesCat, $this->request->getData());
            if ($this->ArticlesCats->save($articlesCat)) {
                $this->Flash->success(__('The articles cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles cat could not be saved. Please, try again.'));
        }
        $situations = $this->ArticlesCats->Situations->find('list', ['limit' => 200]);
        $this->set(compact('articlesCat', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Cat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesCat = $this->ArticlesCats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesCat = $this->ArticlesCats->patchEntity($articlesCat, $this->request->getData());
            if ($this->ArticlesCats->save($articlesCat)) {
                $this->Flash->success(__('The articles cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles cat could not be saved. Please, try again.'));
        }
        $situations = $this->ArticlesCats->Situations->find('list', ['limit' => 200]);
        $this->set(compact('articlesCat', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Cat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesCat = $this->ArticlesCats->get($id);
        if ($this->ArticlesCats->delete($articlesCat)) {
            $this->Flash->success(__('The articles cat has been deleted.'));
        } else {
            $this->Flash->error(__('The articles cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
