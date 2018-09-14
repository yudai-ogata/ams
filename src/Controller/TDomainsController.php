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
        $tDomains = $this->paginate($this->TDomains);

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
        $tDomain = $this->TDomains->get($id, [
            'contain' => ['TUsers']
        ]);

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
                $this->Flash->success(__('The t domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t domain could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The t domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The t domain could not be saved. Please, try again.'));
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
        $this->request->allowMethod(['post', 'delete']);
        $tDomain = $this->TDomains->get($id);
        if ($this->TDomains->delete($tDomain)) {
            $this->Flash->success(__('The t domain has been deleted.'));
        } else {
            $this->Flash->error(__('The t domain could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
