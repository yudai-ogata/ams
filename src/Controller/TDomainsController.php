<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TDomains Controller
 *
 * @property \App\Model\Table\TDomainsTable $TDomains
 *
 * @method \App\Model\Entity\TDomain[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TDomainsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tDomains = $this->TDomains->find()
              ->where(["TDomains.deleted =" => '0']);
        $tDomains = $this->paginate($tDomains);

        $this->set(compact('tDomains'));
    }

    /**
     * View method
     *
     * @param string|null $id T Domain id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*$tDomain = $this->TDomains->get($id, [
            'contain' => ['TUsers']
        ]);*/
        $tDomain = $this->TDomains->find()
                                  ->where(['id' => $id])
                                  ->contain('TUsers', function ($q) {
                                    return $q->where(['TUsers.deleted' => '0']);
                                  })->first();

        $this->set('tDomain', $tDomain);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tDomain = $this->TDomains->newEntity();
        if ($this->request->is('post')) {
            $tDomain = $this->TDomains->patchEntity($tDomain, $this->request->getData());
            if ($this->TDomains->save($tDomain)) {
                $this->Flash->success(__('ドメインの追加が完了しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
        }
        $this->set(compact('tDomain'));
    }

    /**
     * Edit method
     *
     * @param string|null $id T Domain id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tDomain = $this->TDomains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tDomain = $this->TDomains->patchEntity($tDomain, $this->request->getData());
            if ($this->TDomains->save($tDomain)) {
                $this->Flash->success(__('ドメインの内容を更新しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('入力内容にエラーがあります。'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('tDomain'));
    }

    /**
     * Delete method
     *
     * @param string|null $id T Domain id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $tDomain = $this->TDomains->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $getData = $this->request->getData();
            $getData["deleted"] = 1;
            $tDomain = $this->TDomains->patchEntity($tDomain, $getData);
            if ($this->TDomains->save($tDomain)) {
                $this->Flash->success(__('削除が完了しました。'));

                  return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('削除できませんでした。'));
        }
    }
}
