<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticResponses Controller
 *
 * @property \App\Model\Table\SemanticResponsesTable $SemanticResponses
 */
class SemanticResponsesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'SemanticRequests']
        ];
        $semanticResponses = $this->paginate($this->SemanticResponses);

        $this->set(compact('semanticResponses'));
        $this->set('_serialize', ['semanticResponses']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Response id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($id !=null)
        {
            $this->loadModel('Categories');
            $this->loadModel('SemanticRequests');
            
            $id_seman_request = $this->SemanticResponses->get($id)->semantic_request_id;
            
            $id_categories = $this->SemanticRequests->get($id_seman_request)->category_id;
            
            $is_url = false;
            if (($this->Categories->get($id_categories)->visiblis_api_code) == 'url')
            {
                $is_url = true;
            }
            $this->set('is_url', $is_url);
        }        
        
        $semanticResponse = $this->SemanticResponses->get($id, [
            'contain' => ['Languages', 'SemanticRequests']
        ]);

        $this->set('semanticResponse', $semanticResponse);
        $this->set('_serialize', ['semanticResponse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticResponse = $this->SemanticResponses->newEntity();
        if ($this->request->is('post')) {
            $semanticResponse = $this->SemanticResponses->patchEntity($semanticResponse, $this->request->data);
            if ($this->SemanticResponses->save($semanticResponse)) {
                $this->Flash->success(__('The semantic response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic response could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticResponses->Languages->find('list', ['limit' => 200]);
        $semanticRequests = $this->SemanticResponses->SemanticRequests->find('list', ['limit' => 200]);
        $this->set(compact('semanticResponse', 'languages', 'semanticRequests'));
        $this->set('_serialize', ['semanticResponse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Response id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticResponse = $this->SemanticResponses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticResponse = $this->SemanticResponses->patchEntity($semanticResponse, $this->request->data);
            if ($this->SemanticResponses->save($semanticResponse)) {
                $this->Flash->success(__('The semantic response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic response could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticResponses->Languages->find('list', ['limit' => 200]);
        $semanticRequests = $this->SemanticResponses->SemanticRequests->find('list', ['limit' => 200]);
        $this->set(compact('semanticResponse', 'languages', 'semanticRequests'));
        $this->set('_serialize', ['semanticResponse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Response id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticResponse = $this->SemanticResponses->get($id);
        if ($this->SemanticResponses->delete($semanticResponse)) {
            $this->Flash->success(__('The semantic response has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic response could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
