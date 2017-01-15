<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\I18n\Time;
use Cake\Log\Log;

/**
 * SemanticCocoonResponses Controller
 *
 * @property \App\Model\Table\SemanticCocoonResponsesTable $SemanticCocoonResponses
 */
class SemanticCocoonResponsesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
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
    public function view($id = null) {
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id, [
            'contain' => ['SemanticCocoons', 'SemanticCocoonLinks', 'SemanticCocoonUrls']
        ]);

        $this->set('semanticCocoonResponse', $semanticCocoonResponse);
        $this->set('_serialize', ['semanticCocoonResponse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
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
    public function edit($id = null) {
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
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete', 'cancel']);
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id);
        if ($this->SemanticCocoonResponses->delete($semanticCocoonResponse)) {
            $this->Flash->success(__('The semantic cocoon response has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon response could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cancel($id = null) {

        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id, [
            'contain' => []
        ]);
        $configurationsTable = TableRegistry::get('Configurations');
        $configuration = $configurationsTable
                ->find()
                ->where(['is_default' => '1'])
                ->first();

        if (empty($configuration)) {
            $this->Flash->error(__('You should check your default api key.'));
            return $this->redirect(['controller' => 'configurations', 'action' => 'index']);
        }


        $parameter = array();
        $parameter['key'] = $configuration->visiblis_api_key;
        $parameter['kill'] = $semanticCocoonResponse->token;

        if (is_null($parameter['kill'])) {
            $this->Flash->error(__('The koken is empty.'));
            $this->delete($id);
        }
        $http = new Client();
        $address = "http://api.visiblis.net/cocon.php";
        //end of request's time
        $time = Time::now();
        //save end time

        $req_response = $http->get($address, $parameter);

        switch ($req_response->body()) {
            case "status : Jeton invalide":
                $this->Flash->error(__('Token invalid'));
                if (is_null($semanticCocoonResponse->ended)) {
                    $this->delete($id);    
                }
                $this->Flash->success(__('The semantic cocoon request has been cancel.'));
                return $this->redirect(['action' => 'index']);
                break;

            default:
                Log::write(LOG_ERR, $req_response->body());
                break;
        }

        $semanticCocoonResponse->ended = $time;

        if ($this->SemanticCocoonResponses->save($semanticCocoonResponse)) {
            $this->Flash->success(__('The semantic cocoon request has been cancel.'));

            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The semantic cocoon response could not be saved. Please, try again.'));
        }
    }

    public function getStatus($id = null) {
        $semanticCocoonResponse = $this->SemanticCocoonResponses->get($id, [
            'contain' => []
        ]);
        $configurationsTable = TableRegistry::get('Configurations');
        $configuration = $configurationsTable
                ->find()
                ->where(['is_default' => '1'])
                ->first();

        if (empty($configuration)) {
            $this->Flash->error(__('You should check your default api key.'));
            return $this->redirect(['controller' => 'configurations', 'action' => 'index']);
        }
        
        $parameter = array();
        $parameter['key'] = $configuration->visiblis_api_key;
        $parameter['tok'] = $semanticCocoonResponse->token;

        if (is_null($parameter['tok'])) {
            $this->Flash->error(__('The koken is empty.'));
            $this->delete($id);
        }
        $http = new Client();
        $address = "http://api.visiblis.net/cocon.php";
        //end of request's time
        $req_response = $http->get($address, $parameter);
        Log::write(LOG_ERR, $req_response->body());
        $this->Flash->success($req_response->body());
        
        return $this->redirect(['controller' => 'semanticCocoons' ,'action' => 'view', $semanticCocoonResponse->semantic_cocoon_id]);
    }

}
