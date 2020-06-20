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
use Cake\Filesystem\File;

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
       
        $this->loadComponent('RequestHandler', [
			'enableBeforeRedirect' => false
		]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
			'authenticate' => [
				'Form' => [
					'userModel' => 'usuarios',
					'fields' => [
						'id' => 'id',
						'username' => 'login',
						'password' => 'senha'
					]
				]		
			],
			'loginRedirect' => [
				'controller' => 'Pages',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'controller' => 'Usuarios',
				'action' => 'login'
			],
			'loginAction' => [
				'controller' => 'Usuarios',
				'action' => 'login'
			],
            'authError' => 'Você não tem autorização'

		]);	


      //  $this->loadComponent('Upload');
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
	
	public function isAuthorized($login) {
		return true;
	}
	
	public function beforeFilter(Event $event) {
		$this->set('login', $this->Auth->user('login'));
	}


}
