<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AboutUs Controller
 *
 * @property \App\Model\Table\UsersTable $AboutUs
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutUsController extends AppController
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
        $aboutCompsTable = TableRegistry::get('AboutComps');
        $aboutComps = $aboutCompsTable->getAboutCompList();

        $this->set(compact('aboutComps'));
    }
}
