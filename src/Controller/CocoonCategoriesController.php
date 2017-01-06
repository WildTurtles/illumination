<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CocoonsCategories Controller
 *
 * @property \App\Model\Table\CocoonsCategoriesTable $CocoonCategories
 */
class CocoonCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cocoonCategories = $this->paginate($this->CocoonCategories);

        $this->set(compact('cocoonCategories'));
        $this->set('_serialize', ['cocoonCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Cocoon Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cocoonCategory = $this->CocoonCategories->get($id, [
            'contain' => ['SemanticCocoons']
        ]);

        $this->set('cocoonCategory', $cocoonCategory);
        $this->set('_serialize', ['cocoonCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cocoonCategory = $this->CocoonCategories->newEntity();
        if ($this->request->is('post')) {
            $cocoonCategory = 
$this->CocoonCategories->patchEntity($cocoonCategory, $this->request->data);
            if ($this->CocoonCategories->save($cocoonCategory)) {
                $this->Flash->success(__('The cocoons category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cocoons category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cocoonCategory'));
        $this->set('_serialize', ['cocoonCategory']);
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
        $cocoonCategory = $this->CocoonCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cocoonCategory = 
$this->CocoonsCategories->patchEntity($cocoonCategory, $this->request->data);
            if ($this->CocoonCategories->save($cocoonCategory)) {
                $this->Flash->success(__('The cocoons category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cocoons category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('cocoonCategory'));
        $this->set('_serialize', ['cocoonCategory']);
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
        $cocoonCategory = $this->CocoonCategories->get($id);
        if ($this->CocoonCategories->delete($cocoonCategory)) {
            $this->Flash->success(__('The cocoons category has been deleted.'));
        } else {
            $this->Flash->error(__('The cocoons category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
