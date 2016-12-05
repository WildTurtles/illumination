<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CocoonsCategories Controller
 *
 * @property \App\Model\Table\CocoonsCategoriesTable $CocoonsCategories
 */
class CocoonsCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cocoonsCategories = $this->paginate($this->CocoonsCategories);

        $this->set(compact('cocoonsCategories'));
        $this->set('_serialize', ['cocoonsCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Cocoons Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cocoonsCategory = $this->CocoonsCategories->get($id, [
            'contain' => ['SemanticCocoons']
        ]);

        $this->set('cocoonsCategory', $cocoonsCategory);
        $this->set('_serialize', ['cocoonsCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cocoonsCategory = $this->CocoonsCategories->newEntity();
        if ($this->request->is('post')) {
            $cocoonsCategory = $this->CocoonsCategories->patchEntity($cocoonsCategory, $this->request->data);
            if ($this->CocoonsCategories->save($cocoonsCategory)) {
                $this->Flash->success(__('The cocoons category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cocoons category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cocoonsCategory'));
        $this->set('_serialize', ['cocoonsCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cocoons Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cocoonsCategory = $this->CocoonsCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cocoonsCategory = $this->CocoonsCategories->patchEntity($cocoonsCategory, $this->request->data);
            if ($this->CocoonsCategories->save($cocoonsCategory)) {
                $this->Flash->success(__('The cocoons category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cocoons category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cocoonsCategory'));
        $this->set('_serialize', ['cocoonsCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cocoons Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cocoonsCategory = $this->CocoonsCategories->get($id);
        if ($this->CocoonsCategories->delete($cocoonsCategory)) {
            $this->Flash->success(__('The cocoons category has been deleted.'));
        } else {
            $this->Flash->error(__('The cocoons category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
