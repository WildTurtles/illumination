<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticCocoonUniformRessourceLocators Controller
 *
 * @property \App\Model\Table\SemanticCocoonUniformRessourceLocatorsTable $SemanticCocoonUniformRessourceLocators
 */
class SemanticCocoonUniformRessourceLocatorsController extends AppController
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
        $semanticCocoonUniformRessourceLocators = $this->paginate($this->SemanticCocoonUniformRessourceLocators);

        $this->set(compact('semanticCocoonUniformRessourceLocators'));
        $this->set('_serialize', ['semanticCocoonUniformRessourceLocators']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon Uniform Ressource Locator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->get($id, [
            'contain' => ['HttpStatusCodes', 'SemanticCocoonResponses']
        ]);

        $this->set('semanticCocoonUniformRessourceLocator', $semanticCocoonUniformRessourceLocator);
        $this->set('_serialize', ['semanticCocoonUniformRessourceLocator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->patchEntity($semanticCocoonUniformRessourceLocator, $this->request->data);
            if ($this->SemanticCocoonUniformRessourceLocators->save($semanticCocoonUniformRessourceLocator)) {
                $this->Flash->success(__('The semantic cocoon uniform ressource locator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon uniform ressource locator could not be saved. Please, try again.'));
            }
        }
        $httpStatusCodes = $this->SemanticCocoonUniformRessourceLocators->HttpStatusCodes->find('list', ['limit' => 200]);
        $semanticCocoonResponses = $this->SemanticCocoonUniformRessourceLocators->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonUniformRessourceLocator', 'httpStatusCodes', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonUniformRessourceLocator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon Uniform Ressource Locator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->patchEntity($semanticCocoonUniformRessourceLocator, $this->request->data);
            if ($this->SemanticCocoonUniformRessourceLocators->save($semanticCocoonUniformRessourceLocator)) {
                $this->Flash->success(__('The semantic cocoon uniform ressource locator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon uniform ressource locator could not be saved. Please, try again.'));
            }
        }
        $httpStatusCodes = $this->SemanticCocoonUniformRessourceLocators->HttpStatusCodes->find('list', ['limit' => 200]);
        $semanticCocoonResponses = $this->SemanticCocoonUniformRessourceLocators->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonUniformRessourceLocator', 'httpStatusCodes', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonUniformRessourceLocator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon Uniform Ressource Locator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoonUniformRessourceLocator = $this->SemanticCocoonUniformRessourceLocators->get($id);
        if ($this->SemanticCocoonUniformRessourceLocators->delete($semanticCocoonUniformRessourceLocator)) {
            $this->Flash->success(__('The semantic cocoon uniform ressource locator has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon uniform ressource locator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
