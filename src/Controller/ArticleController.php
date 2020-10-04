<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

/**
 * Article Controller
 *
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleController extends AppController
{
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        $this->Auth->allow(['view']);
    }
    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $articlesTable = TableRegistry::get('Articles');
        $article = $articlesTable->getArticle($slug);

        if($article){
            $articlePrev = $articlesTable->getPrevArticle($article->id);
            $articleNext = $articlesTable->getNextArticle($article->id);

            $expression = new QueryExpression('viewed = viewed + 1');
            $articlesTable->updateAll([$expression], ['Articles.id =' => $article->id]);
        }

        $lastArticles = $articlesTable->getLastArticles();
        $spotlightArticles = $articlesTable->getSpotlightArticles();

        $aboutAuthorsTable = TableRegistry::get('AboutAuthors');
        $aboutAuthor = $aboutAuthorsTable->getAboutAuthor();

        $socialNetsTable = TableRegistry::get('SocialNets');
        $socialNets = $socialNetsTable->getSocialNets();

        $this->set(compact('article', 'articlePrev', 'articleNext', 'lastArticles', 'spotlightArticles', 'aboutAuthor', 'socialNets'));
    }
}
