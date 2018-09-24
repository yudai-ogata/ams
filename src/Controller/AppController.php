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

    public $paginate = [
      'limit' => 20,
      ];

    public function initialize()
    {
        parent::initialize();
        $this->TUsers = TableRegistry::get('tUsers');
        $this->TDomains = TableRegistry::get('tDomains');
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Security');

        //ログイン済みの場合、セッション情報の取得
        $session = $this->request->session();
        if ($session->check('Auth')) {
            //ユーザーのnameの取得
            $user_info['name'] = $session->read('Auth.User.name');
            //ユーザーのdomainの取得
            $domain = $this->TDomains->get($session->read('Auth.User.t_domain_id'));
            $user_info['domain'] = $domain['name'];
            //ユーザーのadminの取得
            $user_info['admin'] = $session->read('Auth.User.admin');
            //ユーザーのdeleted fragの取得
            $user_info['deleted'] = $session->read('Auth.User.deleted');
            //削除済みユーザーの場合強制ログアウト
            if($user_info['deleted'] == 1) {
                $this->request->session()->destroy();
                return $this->redirect($this->Auth->logout());
                exit;
            }
            $this->set(compact('user_info'));
        } else {
            $user_info = false;
            $this->set(compact('user_info'));
        }

        //ログイン認証処理
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'TUsers',
                    'fields' => [ // ユーザー名とパスワードに使うカラムの指定。省略した場合はusernameとpasswordになる
                        'username' => 'name', // ユーザー名のカラムを指定
                        'password' => 'password' //パスワードに使うカラムを指定
                    ]
                ]
            ],
            'loginAction' => [
                        'controller' => 'TUsers',
                        'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'TContents',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'TUsers',
                'action' => 'login',
            ],
            'authError' => 'ログインして下さい',
        ]);
        $this->Auth->allow(['login']);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
