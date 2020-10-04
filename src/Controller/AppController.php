<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        // Adição do helper Auth para autenticação em modo global (Chamado para todo projeto)
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'welcome',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'authError' => false,
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    public function beforeRender(Event $event){
        $prefix = null;

        if($this->request->getParam(['prefix']) !== null){
            $prefix = $this->request->getParam(['prefix']);
        }

        if($prefix === 'admin'){
            if(
                (($this->request->getParam(['action']) !== null) AND ($this->request->getParam(['action']) == 'login'))
                OR ($this->request->getParam(['action']) == 'signup')
                OR ($this->request->getParam(['action']) == 'passwordRecovery')
                OR ($this->request->getParam(['action']) == 'resetPassword')
            ){
                $this->viewBuilder()->setLayout('login');
            }else{
                $user = TableRegistry::get('Users');
                $userProfile = $user->getUserData($this->Auth->user('id'));

                $this->set(compact('userProfile'));
                $this->viewBuilder()->setLayout('admin');
            }
        }else {
            $this->viewBuilder()->setLayout('site');
        }
    }
}
