<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TContents Controller
 *
 * @property \App\Model\Table\TContentsTable $TContents
 *
 * @method \App\Model\Entity\TContent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TContentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tContents = $this->paginate($this->TContents);

        $this->set(compact('tContents'));
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
                $this->Flash->success(__('The t content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t content could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The t content has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t content could not be saved. Please, try again.'));
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
        $this->request->allowMethod(['post', 'delete']);
        $tContent = $this->TContents->get($id);
        if ($this->TContents->delete($tContent)) {
            $this->Flash->success(__('The t content has been deleted.'));
        } else {
            $this->Flash->error(__('The t content could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
