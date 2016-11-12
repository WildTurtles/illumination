<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HttpStatusCodes Controller
 *
 * @property \App\Model\Table\HttpStatusCodesTable $HttpStatusCodes
 */
class HttpStatusCodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RequestForComments']
        ];
        $httpStatusCodes = $this->paginate($this->HttpStatusCodes);

        $this->set(compact('httpStatusCodes'));
        $this->set('_serialize', ['httpStatusCodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Http Status Code id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $httpStatusCode = $this->HttpStatusCodes->get($id, [
            'contain' => ['RequestForComments']
        ]);

        $this->set('httpStatusCode', $httpStatusCode);
        $this->set('_serialize', ['httpStatusCode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $httpStatusCode = $this->HttpStatusCodes->newEntity();
        if ($this->request->is('post')) {
            $httpStatusCode = $this->HttpStatusCodes->patchEntity($httpStatusCode, $this->request->data);
            if ($this->HttpStatusCodes->save($httpStatusCode)) {
                $this->Flash->success(__('The http status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The http status code could not be saved. Please, try again.'));
            }
        }
        $requestForComments = $this->HttpStatusCodes->RequestForComments->find('list', ['limit' => 200]);
        $this->set(compact('httpStatusCode', 'requestForComments'));
        $this->set('_serialize', ['httpStatusCode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Http Status Code id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $httpStatusCode = $this->HttpStatusCodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $httpStatusCode = $this->HttpStatusCodes->patchEntity($httpStatusCode, $this->request->data);
            if ($this->HttpStatusCodes->save($httpStatusCode)) {
                $this->Flash->success(__('The http status code has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The http status code could not be saved. Please, try again.'));
            }
        }
        $requestForComments = $this->HttpStatusCodes->RequestForComments->find('list', ['limit' => 200]);
        $this->set(compact('httpStatusCode', 'requestForComments'));
        $this->set('_serialize', ['httpStatusCode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Http Status Code id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $httpStatusCode = $this->HttpStatusCodes->get($id);
        if ($this->HttpStatusCodes->delete($httpStatusCode)) {
            $this->Flash->success(__('The http status code has been deleted.'));
        } else {
            $this->Flash->error(__('The http status code could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
