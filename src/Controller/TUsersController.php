<?php
namespace App\Controller;

use App\Controller\AppController;
use PHPGangsta_GoogleAuthenticator;

/**
 * TUsers Controller
 *
 * @property \App\Model\Table\TUsersTable $TUsers
 *
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TUsersController extends AppController
{

    public $paginate = ['limit' => 20];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $this->paginate = [
            'contain' => ['TDomains']
        ];
        $tUsers = $this->TUsers->find()
              ->where(["TUsers.deleted =" => '0']);
        $tUsers = $this->paginate($tUsers);

        $this->set(compact('tUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id T User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tUser = $this->TUsers->get($id, [
            'contain' => ['TDomains']
        ]);

        $this->set('tUser', $tUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $tUser = $this->TUsers->newEntity();
        if ($this->request->is('post')) {
            $tUser = $this->TUsers->patchEntity($tUser, $this->request->getData());
            if ($this->TUsers->save($tUser)) {
                $this->Flash->success(__('ユーザーの追加が完了しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
        }
        $tDomains = $this->TUsers->TDomains->find('list', ['limit' => 200])
              ->where(["TDomains.deleted =" => '0']);
        $this->set(compact('tUser', 'tDomains'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $tUser = $this->TUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tUser = $this->TUsers->patchEntity($tUser, $this->request->getData());
            if ($this->TUsers->save($tUser)) {
                $this->Flash->success(__('ユーザーの内容を変更しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
        }
        $tDomains = $this->TUsers->TDomains->find('list', ['limit' => 200])
              ->where(["TDomains.deleted =" => '0']);
        $this->set(compact('tUser', 'tDomains'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $tUser = $this->TUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $getData = $this->request->getData();
            $getData["deleted"] = 1;
            $tUser = $this->TUsers->patchEntity($tUser, $getData);
            if ($this->TUsers->save($tUser)) {
                $this->Flash->success(__('削除が完了しました。'));

                  return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除できませんでした。'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        $user_info = $this->viewVars['user_info'];
        //ログイン済みでindexにリダイレクト
        if( $user_info != false ) {
            return $this->redirect($this->Auth->redirectUrl());
            exit;
        }

        //2重認証
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $secret = 'UM7KKMWBV3R6KEQT';
        $code = $g->getCode($secret);//入力コード
        $qrcode = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('ams', $secret, '案件管理システム');

        $tUser = $this->TUsers->newEntity();
        if ($this->request->is('post')) {
            if( !$this->request->data['input_code'] ){
                $this->Flash->error(__('パスコードを入力してください'));
                $this->set(compact('qrcode'));
                return;
            }
            $input_code = $this->request->data['input_code'];
            $tUser = $this->TUsers->patchEntity($tUser, $this->request->data);
            $tUser = $this->Auth->identify();
            if ($tUser) {
                $this->Auth->setUser($tUser);
                if ($g->checkCode($secret, $input_code)) {
                    return $this->redirect($this->Auth->redirectUrl());
                    exit;
                }
                $this->Flash->error(__('正しいパスコードを入力してください'));
                $code = $g->getCode($secret);
                $this->set(compact('qrcode','code'));
                return;
            }
            $this->Flash->error(__('入力内容に間違いがあります'));
        }
        $this->set(compact('qrcode'));
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }
}
