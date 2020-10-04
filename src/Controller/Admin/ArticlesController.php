<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Robots', 'Users', 'Situations', 'ArticlesTps', 'ArticlesCats', 'Situations.Colors']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Robots', 'Users', 'Situations', 'ArticlesTps', 'ArticlesCats', 'Situations.Colors']
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if(!$article->errors()){
                $article->image = $this->Articles->slugUploadImgRed($this->request->getData()['image']['name']);
                $article->user_id = $this->Auth->user('id');

                $article->slug = $this->Articles->slugUrl($this->request->getData()['slug']);

                if($resultSave = $this->Articles->save($article)){
                    $id = $resultSave->id;

                    $path = WWW_ROOT . "files" . DS . "article" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $article->image;

                    if($this->Articles->uploadImgRed($imgUpload, $path, 1920, 846)){
                        $this->Flash->success(__('Image successfully uploaded'));

                        return $this->redirect(['controller' => 'Articles', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('The image could not be uploaded. Please, try again.'));
                    }
                } else {
                    $this->Flash->danger(__('Slide could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->danger(__('Slide could not be saved'));
            }
        }
        $robots = $this->Articles->Robots->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $situations = $this->Articles->Situations->find('list', ['limit' => 200]);
        $articlesTps = $this->Articles->ArticlesTps->find('list', ['limit' => 200]);
        $articlesCats = $this->Articles->ArticlesCats->find('list', ['limit' => 200]);
        $this->set(compact('article', 'robots', 'users', 'situations', 'articlesTps', 'articlesCats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->slug = $this->Articles->slugUrl($this->request->getData()['slug']);

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $robots = $this->Articles->Robots->find('list', ['limit' => 200]);
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $situations = $this->Articles->Situations->find('list', ['limit' => 200]);
        $articlesTps = $this->Articles->ArticlesTps->find('list', ['limit' => 200]);
        $articlesCats = $this->Articles->ArticlesCats->find('list', ['limit' => 200]);
        $this->set(compact('article', 'robots', 'users', 'situations', 'articlesTps', 'articlesCats'));
    }

    public function changeArticlePic($id = null){
        $article = $this->Articles->get($id);
        $oldImage = $article->image;

        if($this->request->is(['patch', 'post', 'put'])){
            $article = $this->Articles->newEntity();
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if(!$article->errors()){
                $article->image = $this->Articles->slugUploadImgRed($this->request->getData()['image']['name']);
                $article->id = $id;

                if($this->Articles->save($article)){
                    $path = WWW_ROOT. "files" . DS . "article" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $article->image;

                    if($this->Articles->uploadImgRed($imgUpload, $path, 500, 400)){
                        $this->Articles->deleteOldFile($path, $oldImage, $article->image);

                        $this->Flash->success(__('Image updated successfully'));
                        return $this->redirect(['controller' => 'Articles', 'action' => 'view', $id]);
                    }else{
                        $article->image = $oldImage;

                        $this->Articles->save($article);

                        $this->Flash->danger(__('Image cannot be updated.'));
                    }
                }else{
                    $this->Flash->danger(__('Image cannot be updated.'));
                }
            }else{
                $this->Flash->danger(__('Image cannot be updated.'));
            }
        }

        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);

        $article = $this->Articles->get($id);
        $path = WWW_ROOT . 'files' . DS . 'article' . DS . $article->id . DS;

        $this->Articles->deleteFiles($path);

        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
