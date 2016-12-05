<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticCocoons Controller
 *
 * @property \App\Model\Table\SemanticCocoonsTable $SemanticCocoons
 */
class SemanticCocoonsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Languages', 'Corpuses', 'Accounts', 'CocoonsCategories']
        ];
        $semanticCocoons = $this->paginate($this->SemanticCocoons);

        $this->set(compact('semanticCocoons'));
        $this->set('_serialize', ['semanticCocoons']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticCocoon = $this->SemanticCocoons->get($id, [
            'contain' => ['Languages', 'Corpuses', 'Accounts', 'CocoonsCategories', 'QueueElements', 'SemanticCocoonResponses']
        ]);

        $this->set('semanticCocoon', $semanticCocoon);
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticCocoon = $this->SemanticCocoons->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoon = $this->SemanticCocoons->patchEntity($semanticCocoon, $this->request->data);
            if ($this->SemanticCocoons->save($semanticCocoon)) {
                $this->Flash->success(__('The semantic cocoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticCocoons->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticCocoons->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticCocoons->Accounts->find('list', ['limit' => 200]);
        $cocoonsCategories = $this->SemanticCocoons->CocoonsCategories->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoon', 'languages', 'corpuses', 'accounts', 'cocoonsCategories'));
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticCocoon = $this->SemanticCocoons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoon = $this->SemanticCocoons->patchEntity($semanticCocoon, $this->request->data);
            if ($this->SemanticCocoons->save($semanticCocoon)) {
                $this->Flash->success(__('The semantic cocoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticCocoons->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticCocoons->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticCocoons->Accounts->find('list', ['limit' => 200]);
        $cocoonsCategories = $this->SemanticCocoons->CocoonsCategories->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoon', 'languages', 'corpuses', 'accounts', 'cocoonsCategories'));
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoon = $this->SemanticCocoons->get($id);
        if ($this->SemanticCocoons->delete($semanticCocoon)) {
            $this->Flash->success(__('The semantic cocoon has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
