<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * KeywordLinkRequests Controller
 *
 * @property \App\Model\Table\KeywordLinkRequestsTable $KeywordLinkRequests
 */
class KeywordLinkRequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Keywords', 'SemanticRequests']
        ];
        $keywordLinkRequests = $this->paginate($this->KeywordLinkRequests);

        $this->set(compact('keywordLinkRequests'));
        $this->set('_serialize', ['keywordLinkRequests']);
    }

    /**
     * View method
     *
     * @param string|null $id Keyword Link Request id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $keywordLinkRequest = $this->KeywordLinkRequests->get($id, [
            'contain' => ['Keywords', 'SemanticRequests']
        ]);

        $this->set('keywordLinkRequest', $keywordLinkRequest);
        $this->set('_serialize', ['keywordLinkRequest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $keywordLinkRequest = $this->KeywordLinkRequests->newEntity();
        if ($this->request->is('post')) {
            $keywordLinkRequest = $this->KeywordLinkRequests->patchEntity($keywordLinkRequest, $this->request->data);
            if ($this->KeywordLinkRequests->save($keywordLinkRequest)) {
                $this->Flash->success(__('The keyword link request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The keyword link request could not be saved. Please, try again.'));
            }
        }
        $keywords = $this->KeywordLinkRequests->Keywords->find('list', ['limit' => 200]);
        $semanticRequests = $this->KeywordLinkRequests->SemanticRequests->find('list', ['limit' => 200]);
        $this->set(compact('keywordLinkRequest', 'keywords', 'semanticRequests'));
        $this->set('_serialize', ['keywordLinkRequest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Keyword Link Request id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $keywordLinkRequest = $this->KeywordLinkRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $keywordLinkRequest = $this->KeywordLinkRequests->patchEntity($keywordLinkRequest, $this->request->data);
            if ($this->KeywordLinkRequests->save($keywordLinkRequest)) {
                $this->Flash->success(__('The keyword link request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The keyword link request could not be saved. Please, try again.'));
            }
        }
        $keywords = $this->KeywordLinkRequests->Keywords->find('list', ['limit' => 200]);
        $semanticRequests = $this->KeywordLinkRequests->SemanticRequests->find('list', ['limit' => 200]);
        $this->set(compact('keywordLinkRequest', 'keywords', 'semanticRequests'));
        $this->set('_serialize', ['keywordLinkRequest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Keyword Link Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $keywordLinkRequest = $this->KeywordLinkRequests->get($id);
        if ($this->KeywordLinkRequests->delete($keywordLinkRequest)) {
            $this->Flash->success(__('The keyword link request has been deleted.'));
        } else {
            $this->Flash->error(__('The keyword link request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
