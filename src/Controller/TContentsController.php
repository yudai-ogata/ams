<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * TContents Controller
 *
 * @property \App\Model\Table\TContentsTable $TContents
 *
 * @method \App\Model\Entity\TContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TContentsController extends AppController
{
    public $paginate = ['limit' => 10];

    public function initialize()
    {
        parent::initialize();
        $session = $this->request->session();
        $number = $session->read('number');
        if (empty($number) ) {
            $number = 10;
        }
        $this->paginate['limit'] = $number;
        $this->TDomains = TableRegistry::get('tDomains');
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($number = null)
    {
        $user_info = $this->viewVars['user_info'];
        if (!empty($this->request->query('page'))) {
            $page = $this->request->query('page');
        }
        $session = $this->request->session();
        if ( !empty($number) ) {
            $session->write('number', $number);
            $this->paginate['limit'] = $number;
        } else {
            $number = $this->paginate['limit'];
        }
        //権限による分岐
        if ($user_info['admin'] == true) {
            $tContents = $this->TContents->find()
                  ->where(["TContents.deleted =" => '0']);
        } else {
            $tContents = $this->TContents->find()
                  ->where(["TContents.deleted =" => '0'])
                  ->andWhere(["TContents.domain =" => $user_info['domain']]);
        }
        $tContents = $this->paginate($tContents);
        $tDomains = $this->TDomains->find()
            ->where(["TDomains.deleted =" => '0'])
            ->select(["name"])
            ->enableHydration(false)
            ->toArray();
        $this->set(compact('tContents',"tDomains", 'number', 'page'));
    }

    /**
     * View method
     *
     * @param string|null $id T Content id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tContent = $this->TContents->get($id, [
            'contain' => []
        ]);

        $this->set('tContent', $tContent);
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
        $tContent = $this->TContents->newEntity();
        if ($this->request->is('post')) {
            $tContent = $this->TContents->patchEntity($tContent, $this->request->getData());
            if ($this->TContents->save($tContent)) {
                $this->Flash->success(__('案件登録が完了しました。.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
        }
        $this->set(compact('tContent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Content id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $tContent = $this->TContents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tContent = $this->TContents->patchEntity($tContent, $this->request->getData());
            if ($this->TContents->save($tContent)) {
                $this->Flash->success(__('案件の内容を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
        }
        $this->set(compact('tContent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Content id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_info = $this->viewVars['user_info'];
        if($user_info['admin'] == false) {
            return $this->redirect(['controller'=>'tContents' ,'action' => 'index']);
        }
        $tContent = $this->TContents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $getData = $this->request->getData();
            $getData["deleted"] = 1;
            $tContent = $this->TContents->patchEntity($tContent, $getData);
            if ($this->TContents->save($tContent)) {
                $this->Flash->success(__('削除が完了しました。'));

                  return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除できませんでした。'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function find($find = null, $number = null)
    {
        $user_info = $this->viewVars['user_info'];
        $tContents=[];
        $session = $this->request->session();
        if(empty($find)){
            if( !empty($this->request->data['find']) ){
                $find = $this->request->data['find'];
                $session -> write('find', $find);
            }
            $find = $session -> read('find');
        }
        if ( !empty($number) ) {
            $session->write('number', $number);
            $this->paginate['limit'] = $number;
        } else {
            $number = $this->paginate['limit'];
        }
        if (!empty($this->request->query('page'))) {
            $page = $this->request->query('page');
        }
        //権限による分岐
        if ($user_info['admin'] == true) {
            $tContents = $this->TContents->find()
                  ->where(["name like " => '%' . $find . '%'])
                  ->orWhere(["created like " => '%' . $find . '%'])
                  ->orWhere(["domain like " => '%' . $find . '%'])
                  ->orWhere(["param like " => $find])
                  ->orWhere(["product_name like " => '%' . $find . '%'])
                  ->andWhere(["TContents.deleted =" => '0']);
        } else {
            $tContents = $this->TContents->find()
                  ->where(["name like " => '%' . $find . '%'])
                  ->orWhere(["created like " => '%' . $find . '%'])
                  ->andWhere(["domain =" => $user_info['domain']])
                  ->orWhere(["param like " => $find])
                  ->orWhere(["product_name like " => '%' . $find . '%'])
                  ->andWhere(["TContents.deleted =" => '0']);
        }
        $tContents = $this->paginate($tContents);
        $tDomains = $this->TDomains->find()
              ->where(["TDomains.deleted =" => '0'])
              ->select(["name"])
              ->enableHydration(false)
              ->toArray();
        $this->set(compact('tContents',"tDomains", "find", 'number','page'));
    }

    public function export($number = null)
    {
        $user_info = $this->viewVars['user_info'];
        $tContents=[];
        $session = $this->request->session();
        if ( !empty($number) ) {
            $session->write('number', $number);
            $this->paginate['limit'] = $number;
        } else {
            $number = $this->paginate['limit'];
        }
        //権限による分岐
        if ($user_info['admin'] == true) {
            $tContents = $this->TContents->find()
                  ->where(["TContents.deleted =" => '0']);
        } else {
            $tContents = $this->TContents->find()
                  ->where(["TContents.deleted =" => '0'])
                  ->andWhere(["TContents.domain =" => $user_info['domain']]);
        }
        $tContents = $this->paginate($tContents);

        $data = $tContents;
        $_serialize = ['data'];
        $_header = ['登録ID', '名前', '名前（カナ）', '年齢', '性別', '電話番号', '郵便番号', '住所', 'E-mail', 'ドメイン名', 'アフィリパラメータ', '商品名', '詳細','登録日', '更新日'];

        $_csvEncoding = 'CP932';
        $_newline = "\r\n";
        $_eol = "\r\n";

        $this->response->download('my_file.csv');
        $this->viewBuilder()->className('CsvView.Csv');
         $this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }

    public function exportFind($find = null, $number = null)
    {
        $user_info = $this->viewVars['user_info'];
        $session = $this->request->session();
        $tContents=[];
        if(empty($find)){
            if( !empty($this->request->data['find']) ){
                $find = $this->request->data['find'];
                $session -> write('find', $find);
            }
            $find = $session -> read('find');
        }
        if ( !empty($number) ) {
            $session->write('number', $number);
            $this->paginate['limit'] = $number;
        } else {
            $number = $this->paginate['limit'];
        }
        //権限による分岐
        if ($user_info['admin'] == true) {
            $tContents = $this->TContents->find()
                  ->where(["name like " => '%' . $find . '%'])
                  ->orWhere(["created like " => '%' . $find . '%'])
                  ->orWhere(["domain like " => '%' . $find . '%'])
                  ->orWhere(["param like " => $find])
                  ->orWhere(["product_name like " => '%' . $find . '%'])
                  ->andWhere(["TContents.deleted =" => '0']);
        } else {
            $tContents = $this->TContents->find()
                  ->where(["name like " => '%' . $find . '%'])
                  ->orWhere(["created like " => '%' . $find . '%'])
                  ->andWhere(["domain =" => $user_info['domain']])
                  ->orWhere(["param like " => $find])
                  ->orWhere(["product_name like " => '%' . $find . '%'])
                  ->andWhere(["TContents.deleted =" => '0']);
        }
        $tContents = $this->paginate($tContents);

        $data = $tContents;
        $_serialize = ['data'];
        $_header = ['登録ID', '名前', '名前（カナ）', '年齢', '性別', '電話番号', '郵便番号', '住所', 'E-mail', 'ドメイン名', 'アフィリパラメータ', '商品名', '詳細','登録日', '更新日'];

        $_csvEncoding = 'CP932';
        $_newline = "\r\n";
        $_eol = "\r\n";

        $this->response->download('my_file.csv');
        $this->viewBuilder()->className('CsvView.Csv');
         $this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }

    public function api()
    {
        $this->viewBuilder()->className('Json');
        $this->response->header("Access-Control-Allow-Origin: *");
        $form_data = $this->request->query();
        if (!empty($form_data)) {
            $tContent = $this->TContents->newEntity();
            $tContent = $this->TContents->patchEntity($tContent, $form_data);
            if ($this->TContents->save($tContent)) {
                $status = true;
                $this->set([
                    'status' => $status,
                    '_serialize' => ['status']
                ]);
                return;
            }
            $status = false;
            $this->set([
                'status' => $status,
                'tContent' => $tContent,
                '_serialize' => ['status', 'tContent']
            ]);
            return;
        }
        $status = false;
        $this->set([
            'status' => $status,
            'form_data' => $form_data,
            '_serialize' => ['status', 'form_data'],
        ]);
        return;
    }
}
