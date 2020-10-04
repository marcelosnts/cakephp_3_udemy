<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ArticlesTps Controller
 *
 * @property \App\Model\Table\ArticlesTpsTable $ArticlesTps
 *
 * @method \App\Model\Entity\ArticlesTp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesTpsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articlesTps = $this->paginate($this->ArticlesTps);

        $this->set(compact('articlesTps'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Tp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesTp = $this->ArticlesTps->get($id, [
            'contain' => []
        ]);

        $this->set('articlesTp', $articlesTp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesTp = $this->ArticlesTps->newEntity();
        if ($this->request->is('post')) {
            $articlesTp = $this->ArticlesTps->patchEntity($articlesTp, $this->request->getData());
            if ($this->ArticlesTps->save($articlesTp)) {
                $this->Flash->success(__('The articles tp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tp could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesTp'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Tp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesTp = $this->ArticlesTps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesTp = $this->ArticlesTps->patchEntity($articlesTp, $this->request->getData());
            if ($this->ArticlesTps->save($articlesTp)) {
                $this->Flash->success(__('The articles tp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles tp could not be saved. Please, try again.'));
        }
        $this->set(compact('articlesTp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Tp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesTp = $this->ArticlesTps->get($id);
        if ($this->ArticlesTps->delete($articlesTp)) {
            $this->Flash->success(__('The articles tp has been deleted.'));
        } else {
            $this->Flash->error(__('The articles tp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
