<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Corpuses Controller
 *
 * @property \App\Model\Table\CorpusesTable $Corpuses
 */
class CorpusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $corpuses = $this->paginate($this->Corpuses);

        $this->set(compact('corpuses'));
        $this->set('_serialize', ['corpuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Corpus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corpus = $this->Corpuses->get($id, [
            'contain' => []
        ]);

        $this->set('corpus', $corpus);
        $this->set('_serialize', ['corpus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corpus = $this->Corpuses->newEntity();
        if ($this->request->is('post')) {
            $corpus = $this->Corpuses->patchEntity($corpus, $this->request->data);
            if ($this->Corpuses->save($corpus)) {
                $this->Flash->success(__('The corpus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The corpus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('corpus'));
        $this->set('_serialize', ['corpus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Corpus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corpus = $this->Corpuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corpus = $this->Corpuses->patchEntity($corpus, $this->request->data);
            if ($this->Corpuses->save($corpus)) {
                $this->Flash->success(__('The corpus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The corpus could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('corpus'));
        $this->set('_serialize', ['corpus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Corpus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corpus = $this->Corpuses->get($id);
        if ($this->Corpuses->delete($corpus)) {
            $this->Flash->success(__('The corpus has been deleted.'));
        } else {
            $this->Flash->error(__('The corpus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
