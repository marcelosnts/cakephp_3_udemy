<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Blog Controller
 *
 *
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogController extends AppController
{
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        $this->Auth->allow(['index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articlesTable = TableRegistry::get('Articles');

        $this->paginate = [
            'limit' => 5,
            'conditions' => [
                'Articles.situation_id' => 1
            ],
            'order' => [
                'Articles.id' => 'desc'
            ]
        ];
        $articles = $this->paginate($articlesTable);

        $aboutAuthorsTable = TableRegistry::get('AboutAuthors');
        $aboutAuthor = $aboutAuthorsTable->getAboutAuthor();

        $lastArticles = $articlesTable->getLastArticles();
        $spotlightArticles = $articlesTable->getSpotlightArticles();

        $socialNetsTable = TableRegistry::get('SocialNets');
        $socialNets = $socialNetsTable->getSocialNets();

        $this->set(compact('articles', 'lastArticles', 'spotlightArticles', 'aboutAuthor', 'socialNets'));
    }
}
