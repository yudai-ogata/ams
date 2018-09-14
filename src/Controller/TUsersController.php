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
        $tUsers = $this->paginate($this->TUsers);

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
                $this->Flash->success(__('The t user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t user could not be saved. Please, try again.'));
        }
        $tDomains = $this->TUsers->TDomains->find('list', ['limit' => 200]);
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
                $this->Flash->success(__('The t user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t user could not be saved. Please, try again.'));
        }
        $tDomains = $this->TUsers->TDomains->find('list', ['limit' => 200]);
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
        $this->request->allowMethod(['post', 'delete']);
        $tUser = $this->TUsers->get($id);
        if ($this->TUsers->delete($tUser)) {
            $this->Flash->success(__('The t user has been deleted.'));
        } else {
            $this->Flash->error(__('The t user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
