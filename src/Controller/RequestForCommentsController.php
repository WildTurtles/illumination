<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequestForComments Controller
 *
 * @property \App\Model\Table\RequestForCommentsTable $RequestForComments
 */
class RequestForCommentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $requestForComments = $this->paginate($this->RequestForComments);

        $this->set(compact('requestForComments'));
        $this->set('_serialize', ['requestForComments']);
    }

    /**
     * View method
     *
     * @param string|null $id Request For Comment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requestForComment = $this->RequestForComments->get($id, [
            'contain' => ['HttpStatusCodes']
        ]);

        $this->set('requestForComment', $requestForComment);
        $this->set('_serialize', ['requestForComment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requestForComment = $this->RequestForComments->newEntity();
        if ($this->request->is('post')) {
            $requestForComment = $this->RequestForComments->patchEntity($requestForComment, $this->request->data);
            if ($this->RequestForComments->save($requestForComment)) {
                $this->Flash->success(__('The request for comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request for comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requestForComment'));
        $this->set('_serialize', ['requestForComment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request For Comment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requestForComment = $this->RequestForComments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestForComment = $this->RequestForComments->patchEntity($requestForComment, $this->request->data);
            if ($this->RequestForComments->save($requestForComment)) {
                $this->Flash->success(__('The request for comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request for comment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('requestForComment'));
        $this->set('_serialize', ['requestForComment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request For Comment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requestForComment = $this->RequestForComments->get($id);
        if ($this->RequestForComments->delete($requestForComment)) {
            $this->Flash->success(__('The request for comment has been deleted.'));
        } else {
            $this->Flash->error(__('The request for comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
