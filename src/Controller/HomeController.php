<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 * @property \App\Model\Table\UsersTable $Home
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    public $paginate = [
        'limit' => 5,
    ];

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
        $carouselTable = TableRegistry::get('Carousels');
        $carousels = $carouselTable->getHomeSlideList();

        $servicesTable = TableRegistry::get('Services');
        $services = $servicesTable->getServicesList('1');

        $depoinmentsTable = TableRegistry::get('Depoinments');
        $depoinments = $depoinmentsTable->getDepoinmentsList('1');

        $articlesTable = TableRegistry::get('Articles');
        $lastArticles = $articlesTable->getLastArticles(3, true);

        $this->set(compact('carousels', 'services', 'depoinments', 'lastArticles'));
    }
}
