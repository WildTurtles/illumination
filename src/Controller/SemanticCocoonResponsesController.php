<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SemanticCocoonResponses Controller
 *
 * @property \App\Model\Table\SemanticCocoonResponsesTable $SemanticCocoonResponses
 */
class SemanticCocoonResponsesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SemanticCocoons']
        ];
        $semanticCocoonResponses = $this->paginate($this->SemanticCocoonResponses);

        $this->set(compact('semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonResponses']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon Response id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id, [
            'contain' => ['SemanticCocoons', 'SemanticCocoonLinks', 'SemanticCocoonUrls']
        ]);
        $languagesTable = TableRegistry::get('Languages');
        $language = $languagesTable
			->find()
			->where(['id' => $semanticCocoonResponse->semantic_cocoon->language_id])
			->first();
			
		$corpusesTable = TableRegistry::get('Corpuses');
        $corpuses = $corpusesTable
			->find()
			->where(['id' => $semanticCocoonResponse->semantic_cocoon->corpus_id])
			->first();
		$this->set('language', $language);
		$this->set('corpuses', $corpuses);
        $this->set('semanticCocoonResponse', $semanticCocoonResponse);
        $this->set('_serialize', ['semanticCocoonResponse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticCocoonResponse = $this->SemanticCocoonResponses->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoonResponse = $this->SemanticCocoonResponses->patchEntity($semanticCocoonResponse, $this->request->data);
            if ($this->SemanticCocoonResponses->save($semanticCocoonResponse)) {
                $this->Flash->success(__('The semantic cocoon response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon response could not be saved. Please, try again.'));
            }
        }
        $semanticCocoons = $this->SemanticCocoonResponses->SemanticCocoons->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonResponse', 'semanticCocoons'));
        $this->set('_serialize', ['semanticCocoonResponse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon Response id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoonResponse = $this->SemanticCocoonResponses->patchEntity($semanticCocoonResponse, $this->request->data);
            if ($this->SemanticCocoonResponses->save($semanticCocoonResponse)) {
                $this->Flash->success(__('The semantic cocoon response has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon response could not be saved. Please, try again.'));
            }
        }
        $semanticCocoons = $this->SemanticCocoonResponses->SemanticCocoons->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonResponse', 'semanticCocoons'));
        $this->set('_serialize', ['semanticCocoonResponse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon Response id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id);
        if ($this->SemanticCocoonResponses->delete($semanticCocoonResponse)) {
            $this->Flash->success(__('The semantic cocoon response has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon response could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
