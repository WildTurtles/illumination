<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticCocoonUrls Controller
 *
 * @property \App\Model\Table\SemanticCocoonUrlsTable $SemanticCocoonUrls
 */
class SemanticCocoonUrlsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['HttpStatusCodes', 'SemanticCocoonResponses']
        ];
        $semanticCocoonUrls = $this->paginate($this->SemanticCocoonUrls);

        $this->set(compact('semanticCocoonUrls'));
        $this->set('_serialize', ['semanticCocoonUrls']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon Url id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticCocoonUrl = $this->SemanticCocoonUrls->get($id, [
            'contain' => ['HttpStatusCodes', 'SemanticCocoonResponses']
        ]);

        $this->set('semanticCocoonUrl', $semanticCocoonUrl);
        $this->set('_serialize', ['semanticCocoonUrl']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticCocoonUrl = $this->SemanticCocoonUrls->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoonUrl = $this->SemanticCocoonUrls->patchEntity($semanticCocoonUrl, $this->request->data);
            if ($this->SemanticCocoonUrls->save($semanticCocoonUrl)) {
                $this->Flash->success(__('The semantic cocoon url has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon url could not be saved. Please, try again.'));
            }
        }
        $httpStatusCodes = $this->SemanticCocoonUrls->HttpStatusCodes->find('list', ['limit' => 200]);
        $semanticCocoonResponses = $this->SemanticCocoonUrls->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonUrl', 'httpStatusCodes', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonUrl']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon Url id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticCocoonUrl = $this->SemanticCocoonUrls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoonUrl = $this->SemanticCocoonUrls->patchEntity($semanticCocoonUrl, $this->request->data);
            if ($this->SemanticCocoonUrls->save($semanticCocoonUrl)) {
                $this->Flash->success(__('The semantic cocoon url has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon url could not be saved. Please, try again.'));
            }
        }
        $httpStatusCodes = $this->SemanticCocoonUrls->HttpStatusCodes->find('list', ['limit' => 200]);
        $semanticCocoonResponses = $this->SemanticCocoonUrls->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonUrl', 'httpStatusCodes', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonUrl']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon Url id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoonUrl = $this->SemanticCocoonUrls->get($id);
        if ($this->SemanticCocoonUrls->delete($semanticCocoonUrl)) {
            $this->Flash->success(__('The semantic cocoon url has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon url could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
