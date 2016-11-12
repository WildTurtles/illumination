<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NotificationTexts Controller
 *
 * @property \App\Model\Table\NotificationTextsTable $NotificationTexts
 */
class NotificationTextsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $notificationTexts = $this->paginate($this->NotificationTexts);

        $this->set(compact('notificationTexts'));
        $this->set('_serialize', ['notificationTexts']);
    }

    /**
     * View method
     *
     * @param string|null $id Notification Text id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificationText = $this->NotificationTexts->get($id, [
            'contain' => ['Notifications']
        ]);

        $this->set('notificationText', $notificationText);
        $this->set('_serialize', ['notificationText']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificationText = $this->NotificationTexts->newEntity();
        if ($this->request->is('post')) {
            $notificationText = $this->NotificationTexts->patchEntity($notificationText, $this->request->data);
            if ($this->NotificationTexts->save($notificationText)) {
                $this->Flash->success(__('The notification text has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification text could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('notificationText'));
        $this->set('_serialize', ['notificationText']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification Text id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificationText = $this->NotificationTexts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificationText = $this->NotificationTexts->patchEntity($notificationText, $this->request->data);
            if ($this->NotificationTexts->save($notificationText)) {
                $this->Flash->success(__('The notification text has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The notification text could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('notificationText'));
        $this->set('_serialize', ['notificationText']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification Text id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificationText = $this->NotificationTexts->get($id);
        if ($this->NotificationTexts->delete($notificationText)) {
            $this->Flash->success(__('The notification text has been deleted.'));
        } else {
            $this->Flash->error(__('The notification text could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
