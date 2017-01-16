<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
use App\Model\Entity\SemanticResponse;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Collection\Collection;
use Cake\Log\Log;
use Cake\Routing\Router;

/**
 * SemanticCocoons Controller
 *
 * @property \App\Model\Table\SemanticCocoonsTable $SemanticCocoons
 */
class SemanticCocoonsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Languages', 'Corpuses', 'Accounts',
                'CocoonCategories'],
            'order' => ['SemanticCocoons.created' => 'desc']
 
        ];
        $semanticCocoons = $this->paginate($this->SemanticCocoons);

        $this->set(compact('semanticCocoons'));
        $this->set('_serialize', ['semanticCocoons']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $semanticCocoon = $this->SemanticCocoons->get($id, [
            'contain' => ['Languages', 'Corpuses', 'Accounts',
                'CocoonCategories', 'QueueElements', 'SemanticCocoonResponses'],
            ]);

        $this->set('semanticCocoon', $semanticCocoon);
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $semanticCocoon = $this->SemanticCocoons->newEntity();
        if ($this->request->is('post')) {
            $semanticCocoon = $this->SemanticCocoons->patchEntity($semanticCocoon, $this->request->data);
            if ($this->SemanticCocoons->save($semanticCocoon)) {
                $this->Flash->success(__('The semantic cocoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticCocoons->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticCocoons->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticCocoons->Accounts->find('list', ['limit' => 200]);
        $cocoonCategories = $this->SemanticCocoons->CocoonCategories->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoon', 'languages', 'corpuses', 'accounts', 'cocoonCategories'));
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $semanticCocoon = $this->SemanticCocoons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticCocoon = $this->SemanticCocoons->patchEntity($semanticCocoon, $this->request->data);
            if ($this->SemanticCocoons->save($semanticCocoon)) {
                $this->Flash->success(__('The semantic cocoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic cocoon could not be saved. Please, try again.'));
            }
        }
        $languages = $this->SemanticCocoons->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticCocoons->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticCocoons->Accounts->find('list', ['limit' => 200]);
        $cocoonCategories = $this->SemanticCocoons->CocoonCategories->find('list', ['limit' => 200]);
        $this->set(compact('semanticCocoon', 'languages', 'corpuses', 'accounts', 'cocoonCategories'));
        $this->set('_serialize', ['semanticCocoon']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Cocoon id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $semanticCocoon = $this->SemanticCocoons->get($id);
        if ($this->SemanticCocoons->delete($semanticCocoon)) {
            $this->Flash->success(__('The semantic cocoon has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic cocoon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cocoon($id = null) {
        $request = $this->SemanticCocoons->get($id, [
            'contain' => ['Languages', 'Corpuses', 'CocoonCategories', 'Accounts']
        ]);

        $request->count++;
        $this->SemanticCocoons->save($request);
        $this->loadModel('SemanticCocoonResponses');

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
        $parameter['url'] = $request->get('url');
        $parameter['mail'] = $this->Auth->user('email');        
        $parameter['req'] = $request->get('request');
//         if ($request->get('clusters'))
        $parameter['clr'] = $request->get('clusters');
        $parameter['ping'] = Router::url('/', true) . "semantic-cocoons/response";
        $parameter['lng'] = $request->get('language')->get('visiblis_code');
        $parameter['fmt'] = "json";
        $parameter['crp'] = $request->get('corpus')->get('visiblis_number');
        $http = new Client();
        $address = "http://api.visiblis.net/cocon.php";

        //create form
        $semanticCocoonResponses = $this->SemanticCocoonResponses->newEntity();

        //begin time for recover the request's time
        $time = Time::now();
        //save the begin's time
        $semanticCocoonResponses->started = $time;
        //increment the number of execute request
        $semanticCocoonResponses->count = $request->count;
        $semanticCocoonResponses->semantic_cocoon_id = $id;

        $req_response = $http->get($address, $parameter);

        if ($req_response->isOk()) {
            $json = $req_response->json;
            $semanticCocoonResponses->token = $json['token'];
        } else {
            if ($req_response->getStatusCode() === '404') {

                $pos = strpos($req_response->body(), ";mess=");
                $error_number = substr($req_response->body(), 4, $pos - 4);
                $error_message = substr($req_response->body(), 11);


                $this->Flash->error(__('The request could not be execute. Please, try again.'));
                $this->Flash->error(__('Error number : ' . $error_number . '. Error message : ' . $error_message));
                $this->Flash->error(__('You should check your resquet is valid.'));
            } else {

                $this->Flash->error(__('The request could not be execute. Please, try again. Error number ' . $response->getStatusCode()));
            }
        }

        if ($this->SemanticCocoonResponses->save($semanticCocoonResponses)) {
            $this->Flash->success(__('The semantic cocoon  response been sent for execution.'));
        } else {
            $this->Flash->error(__('The semantic cocoon response could not be sent for execution. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function response() {
        $token = $this->request->query('tok');
        $semanticCocoonResponses = TableRegistry::get('semantic_cocoon_responses');
        Log::write(LOG_ERR, $this->request);
        $result = $semanticCocoonResponses
                ->find()
                ->where(['token' => $token])
                ->first();

		$category = $this->SemanticCocoons->get($result->semantic_cocoon_id)->cocoon_category_id;
                
		$treeTable = TableRegistry::get('CocoonCategories');
		$tree = $treeTable
					->find()
					->where(['name' => 'TreeAlyser'])
					->first();
		
        //end of request's time
        $time = Time::now();
        //save end time
        $result->ended = $time;

        //save result
        $this->loadModel('SemanticCocoonResponses');
        $this->SemanticCocoonResponses->save($result);

        $this->request->allowMethod(['get', 'response']);
        $data = $this->request->query('tok');

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
        $parameter['tok'] = $token;
        $parameter['fmt'] = 'json';
 

        $http = new Client();
        $address = "http://api.visiblis.net/cocon.php";

        $req_response = $http->get($address, $parameter);
        
        if ($req_response->isOk()) {

            $json = $req_response->json;

            $this->loadModel('SemanticCocoonLinks');
            $this->loadModel('SemanticCocoonUrls');

            foreach ($json['links'] as $link) {
                $semanticCocoonLinks = $this->SemanticCocoonLinks->newEntity();
                $semanticCocoonLinks->source = $link['src'];
                $semanticCocoonLinks->destination = $link['dest'];
                $semanticCocoonLinks->semantic_cocoon_response_id = $result->id;
                $this->SemanticCocoonLinks->save($semanticCocoonLinks);
            }

            $httpStatusCodes = TableRegistry::get('http_status_codes');
            if ($category==$tree)
            {
				foreach ($json['urls'] as $url) {
					$semanticCocoonUrls = $this->SemanticCocoonUrls->newEntity();
					$semanticCocoonUrls->id_url_visiblis = $url['id'];
					$semanticCocoonUrls->url = $url['url'];
					$semanticCocoonUrls->as_title = $url['as_titre'];
					$semanticCocoonUrls->as_page = $url['as_page'];
					$semanticCocoonUrls->title_semantic_rank = $url['sr_titre'];
					$semanticCocoonUrls->page_semantic_rank = $url['sr_page'];
					$semanticCocoonUrls->page_rank = $url['pr_page'];
					$semanticCocoonUrls->semantic_cocoon_response_id = $result->id;
					$code = $httpStatusCodes
							->find()
							->where(['name' => $url['rt_code']])
							->first();
					$semanticCocoonUrls->http_status_code_id = 'bfec5b49-7951-4195-af89-57bd53e0bbe4';
					$this->SemanticCocoonUrls->save($semanticCocoonUrls);
				
				}
			}
			else
			{
				foreach ($json['urls'] as $url) 
				{
					$semanticCocoonUrls = $this->SemanticCocoonUrls->newEntity();
					$semanticCocoonUrls->url = $url['url'];
					$semanticCocoonUrls->id_url_visiblis = $url['id'];
					$semanticCocoonUrls->cluster= $url['cluster'];
					$semanticCocoonUrls->page_rank = $url['pr_page'];
					$semanticCocoonUrls->semantic_cocoon_response_id = $result->id;
					$code = $httpStatusCodes
							->find()
							->where(['name' => $url['rt_code']])
							->first();
					$semanticCocoonUrls->http_status_code_id = 'bfec5b49-7951-4195-af89-57bd53e0bbe4';
					$this->SemanticCocoonUrls->save($semanticCocoonUrls);
				}
			}

            return $this->redirect(['controller' => 'SemanticCocoonResponses', 'action' => 'view', $result->id]);
        } else {
            if ($req_response->getStatusCode() === '404') {

                $pos = strpos($req_response->body(), ";mess=");
                $error_number = substr($req_response->body(), 4, $pos - 4);
                $error_message = substr($req_response->body(), 11);


                $this->Flash->error(__('The request could not be execute. Please, try again.'));
                $this->Flash->error(__('Error number : ' . $error_number . '. Error message : ' . $error_message));
                $this->Flash->error(__('You should check your resquet is valid.'));
            } else {

                $this->Flash->error(__('The request could not be execute. Please, try again. Error number ' . $response->getStatusCode()));
            }
        }
    }

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['response']);
    }
    
}
