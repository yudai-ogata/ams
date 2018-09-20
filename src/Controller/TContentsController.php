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

    public function initialize()
    {
         parent::initialize();

         $this->TDomains = TableRegistry::get('tDomains');
    }
  
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tContents = $this->TContents->find()
              ->where(["TContents.deleted =" => '0']);
        $tContents = $this->paginate($tContents);
        $tDomains = $this->TDomains->find()
              ->where(["TDomains.deleted =" => '0'])
              ->select(["name"])
              ->enableHydration(false)
              ->toArray();
        $this->set(compact('tContents',"tDomains"));
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
        $tContent = $this->TContents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tContent = $this->TContents->patchEntity($tContent, $this->request->getData());
            if ($this->TContents->save($tContent)) {
                $this->Flash->success(__('案件内容の更新しました。'));

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
}
