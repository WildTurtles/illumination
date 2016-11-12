<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QueueElements Controller
 *
 * @property \App\Model\Table\QueueElementsTable $QueueElements
 */
class QueueElementsController extends AppController
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
        $queueElements = $this->paginate($this->QueueElements);

        $this->set(compact('queueElements'));
        $this->set('_serialize', ['queueElements']);
    }

    /**
     * View method
     *
     * @param string|null $id Queue Element id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $queueElement = $this->QueueElements->get($id, [
            'contain' => ['SemanticCocoons']
        ]);

        $this->set('queueElement', $queueElement);
        $this->set('_serialize', ['queueElement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $queueElement = $this->QueueElements->newEntity();
        if ($this->request->is('post')) {
            $queueElement = $this->QueueElements->patchEntity($queueElement, $this->request->data);
            if ($this->QueueElements->save($queueElement)) {
                $this->Flash->success(__('The queue element has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The queue element could not be saved. Please, try again.'));
            }
        }
        $semanticCocoons = $this->QueueElements->SemanticCocoons->find('list', ['limit' => 200]);
        $this->set(compact('queueElement', 'semanticCocoons'));
        $this->set('_serialize', ['queueElement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Queue Element id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $queueElement = $this->QueueElements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $queueElement = $this->QueueElements->patchEntity($queueElement, $this->request->data);
            if ($this->QueueElements->save($queueElement)) {
                $this->Flash->success(__('The queue element has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The queue element could not be saved. Please, try again.'));
            }
        }
        $semanticCocoons = $this->QueueElements->SemanticCocoons->find('list', ['limit' => 200]);
        $this->set(compact('queueElement', 'semanticCocoons'));
        $this->set('_serialize', ['queueElement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Queue Element id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $queueElement = $this->QueueElements->get($id);
        if ($this->QueueElements->delete($queueElement)) {
            $this->Flash->success(__('The queue element has been deleted.'));
        } else {
            $this->Flash->error(__('The queue element could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
