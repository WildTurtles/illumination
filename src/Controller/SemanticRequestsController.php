<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticRequests Controller
 *
 * @property \App\Model\Table\SemanticRequestsTable $SemanticRequests
 */
class SemanticRequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Languages', 'Corpuses', 'Accounts']
        ];
        $semanticRequests = $this->paginate($this->SemanticRequests);

        $this->set(compact('semanticRequests'));
        $this->set('_serialize', ['semanticRequests']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticRequest = $this->SemanticRequests->get($id, [
            'contain' => ['Categories', 'Languages', 'Corpuses', 'Accounts']
        ]);

        $this->set('semanticRequest', $semanticRequest);
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticRequest = $this->SemanticRequests->newEntity();
        if ($this->request->is('post')) {
            $semanticRequest = $this->SemanticRequests->patchEntity($semanticRequest, $this->request->data);
            if ($this->SemanticRequests->save($semanticRequest)) {
                $this->Flash->success(__('The semantic request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
            }
        }
        $categories = $this->SemanticRequests->Categories->find('list', ['limit' => 200]);
        $languages = $this->SemanticRequests->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticRequests->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticRequests->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('semanticRequest', 'categories', 'languages', 'corpuses', 'accounts'));
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticRequest = $this->SemanticRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticRequest = $this->SemanticRequests->patchEntity($semanticRequest, $this->request->data);
            if ($this->SemanticRequests->save($semanticRequest)) {
                $this->Flash->success(__('The semantic request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
            }
        }
        $categories = $this->SemanticRequests->Categories->find('list', ['limit' => 200]);
        $languages = $this->SemanticRequests->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticRequests->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticRequests->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('semanticRequest', 'categories', 'languages', 'corpuses', 'accounts'));
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticRequest = $this->SemanticRequests->get($id);
        if ($this->SemanticRequests->delete($semanticRequest)) {
            $this->Flash->success(__('The semantic request has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
