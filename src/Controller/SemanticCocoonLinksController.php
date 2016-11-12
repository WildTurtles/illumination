<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SemanticCocoonLinks Controller
 *
 * @property \App\Model\Table\SemanticCocoonLinksTable $SemanticCocoonLinks
 */
class SemanticCocoonLinksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SemanticCocoonResponses']
        ];
        $semanticCocoonLinks = $this->paginate($this->SemanticCocoonLinks);

        $this->set(compact('semanticCocoonLinks'));
        $this->set('_serialize', ['semanticCocoonLinks']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon Link id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semanticCocoonLink = $this->SemanticCocoonLinks->get($id, [
            'contain' => ['SemanticCocoonResponses']
        ]);

        $this->set('semanticCocoonLink', $semanticCocoonLink);
        $this->set('_serialize', ['semanticCocoonLink']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semanticCocoonLink = $this->SemanticCocoonLinks->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoonLink = $this->SemanticCocoonLinks->patchEntity($semanticCocoonLink, $this->request->data);
            if ($this->SemanticCocoonLinks->save($semanticCocoonLink)) {
                $this->Flash->success(__('The semantic cocoon link has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon link could not be saved. Please, try again.'));
            }
        }
        $semanticCocoonResponses = $this->SemanticCocoonLinks->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonLink', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonLink']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon Link id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semanticCocoonLink = $this->SemanticCocoonLinks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoonLink = $this->SemanticCocoonLinks->patchEntity($semanticCocoonLink, $this->request->data);
            if ($this->SemanticCocoonLinks->save($semanticCocoonLink)) {
                $this->Flash->success(__('The semantic cocoon link has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon link could not be saved. Please, try again.'));
            }
        }
        $semanticCocoonResponses = $this->SemanticCocoonLinks->SemanticCocoonResponses->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoonLink', 'semanticCocoonResponses'));
        $this->set('_serialize', ['semanticCocoonLink']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon Link id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoonLink = $this->SemanticCocoonLinks->get($id);
        if ($this->SemanticCocoonLinks->delete($semanticCocoonLink)) {
            $this->Flash->success(__('The semantic cocoon link has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
