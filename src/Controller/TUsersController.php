<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TUsers Controller
 *
 * @property \App\Model\Table\TUsersTable $TUsers
 *
 * @method \App\Model\Entity\TUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
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
}
