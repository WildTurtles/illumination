<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\SemanticRequest;
use App\Model\Entity\Configuration;
use Cake\ORM\TableRegistry;

/**
 * SemanticRequests Controller
 *
 * @property \App\Model\Table\SemanticRequestsTable $SemanticRequests
 */
class SemanticRequestsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Categories', 'Languages', 'Corpuses', 'Accounts'],
            'order' => ['SemanticRequests.created' => 'desc']
        ];
        $semanticRequests = $this->paginate($this->SemanticRequests);

        $this->set(compact('semanticRequests'));
        $this->set('_serialize', ['semanticRequests']);
    }

    /**
     * View method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->paginate = [
            'contain' => ['KeywordLinkRequests'],
            'order' => ['SemanticResponses.created' => 'desc']
        ];
        $this->loadModel('KeywordLinkRequests');
        $this->loadModel('Keywords');
        $this->loadModel('SemanticResponse');

        $semanticRequest = $this->SemanticRequests->get($id, [
            'contain' => ['Categories', 'Languages', 'Corpuses', 'Accounts']
        ]);


        if (empty($semanticRequest->request)) {
            $keywordLinkRequestsTable = TableRegistry::get('KeywordLinkRequests');


            $keywordLinkRequests = $keywordLinkRequestsTable
                    ->find('all', ['contain' => ['Keywords']])
                    ->where(['semantic_request_id' => $semanticRequest->id]);
//            $keywordLinkRequests = $keywordLinkRequests->find('all');
            $keywordLinkRequests = $keywordLinkRequests->find('all', array(
                'order' => array('count' => 'DESC')));
            $result = $keywordLinkRequests->all();
            $temp = $result->toArray();

            $this->set('keywordLinkRequests', $temp);
        } else {
            $semanticResponsesTable = TableRegistry::get('SemanticResponses');

            $config = [
                'order' => [
                    'created' => 'asc'
                ]
            ];

            $semanticResponses = $semanticResponsesTable
                    ->find('all')
                    ->where(['semantic_request_id' => $semanticRequest->id]);

            //$res = $this->Paginator->paginate($semanticResponses->all(), $config);
            //if (!empty($res))
            $result = $semanticResponses->all();

            if (!empty($result)) {
                $this->set('semanticResponses', $result->toArray());
            }
        }





        $this->set('semanticRequest', $semanticRequest);
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $categoriesTable = TableRegistry::get('Categories');
        $url = $categoriesTable
                ->find()
                ->where(['visiblis_api_code' => 'url'])
                ->first();

        $semanticRequest = $this->SemanticRequests->newEntity();
        if ($this->request->is('post')) {
            $semanticRequest = $this->SemanticRequests->patchEntity($semanticRequest, $this->request->data);

            if (($semanticRequest->category_id) != $url) {
                $semanticRequest->block = '';
            }
            if ($this->SemanticRequests->save($semanticRequest)) {
                $this->Flash->success(__('The semantic request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
            }
        }
        $categories = $this->SemanticRequests->Categories->find('list', ['limit' => 200]);
        $languages = $this->SemanticRequests->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticRequests->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticRequests->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('semanticRequest', 'categories', 'languages', 'corpuses', 'accounts'));
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $semanticRequest = $this->SemanticRequests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semanticRequest = $this->SemanticRequests->patchEntity($semanticRequest, $this->request->data);
            if ($this->SemanticRequests->save($semanticRequest)) {
                $this->Flash->success(__('The semantic request has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
            }
        }
        $categories = $this->SemanticRequests->Categories->find('list', ['limit' => 200]);
        $languages = $this->SemanticRequests->Languages->find('list', ['limit' => 200]);
        $corpuses = $this->SemanticRequests->Corpuses->find('list', ['limit' => 200]);
        $accounts = $this->SemanticRequests->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('semanticRequest', 'categories', 'languages', 'corpuses', 'accounts'));
        $this->set('_serialize', ['semanticRequest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $semanticRequest = $this->SemanticRequests->get($id);
        if ($this->SemanticRequests->delete($semanticRequest)) {
            $this->Flash->success(__('The semantic request has been deleted.'));
        } else {
            $this->Flash->error(__('The semantic request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Execute method
     *
     * @param string|null $id Semantic Request id.
     * @return \Cake\Network\Response|void Redirects on successful execute, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function execute($id = null) {
        $request = $this->SemanticRequests->get($id, [
            'contain' => ['Languages', 'Corpuses', 'Categories', 'Accounts']
        ]);
        $request->count++;
        $this->SemanticRequests->save($request);
        $configurationsTable = TableRegistry::get('Configurations');
        $config = new Configuration();
        $configuration = $config->getFirstDefault();
        
        if (empty($configuration)) {
            $this->Flash->error(__('You should check your default api key.'));
            return $this->redirect(['controller' => 'configurations', 'action' => 'index']);
        }
        $sem = new SemanticRequest();
        $parameter = $sem->setParameters($request, $configuration);
        $req_response = $sem->sendRequest($parameter);
        if ($req_response->isOk()) {
            $json = $req_response->json;
            if (!empty($json['keywords'])) {
                $sem->keywords($json, $request);
            } else {
                $resp = $sem->keywordLinks($json, $request);
                $semanticResponsesTable = TableRegistry::get('SemanticResponses');
                $semanticResponse = $semanticResponsesTable->newEntity();
                $semanticResponse = $semanticResponsesTable->patchEntity($semanticResponse, $resp);
                $semanticResponse->count = $request->count;
                if ($semanticResponsesTable->save($semanticResponse)) {
                    $this->Flash->success(__('The semantic response has been saved.'));
                } else {
                    $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
                }
            }
        } else {
            if ($req_response->getStatusCode() === '404') {
                $errorMessage = $sem->parseError($req_response->body());
                $this->Flash->error(__('The request could not be execute. Please, try again.'));
                $this->Flash->error(__('Error number : ' . $errorMessage['number'] . '. Error message : ' . $errorMessage['message']));
                $this->Flash->error(__('You should check your resquet is valid.'));
            } else {
                $this->Flash->error(__('The request could not be execute. Please, try again. Error number ' . $response->getStatusCode()));
            }
        }
        return $this->redirect(['action' => 'view', $request->id]);
    }

//        $configurationsTable = TableRegistry::get('Configurations');
//        
//        $configuration = $configurationsTable
//                ->find()
//                ->where(['is_default' => '1'])
//                ->first();
//        if (empty($configuration)) {
//            $this->Flash->error(__('You should check your default api key.'));
//            return $this->redirect(['controller' => 'configurations' ,'action' => 'index']);
//        }
//
//        $parameter = array();
//
//        $parameter['key'] = $configuration->visiblis_api_key;
//        $parameter[$request->get('category')->get('visiblis_api_code')] = $request->get('field');
//
//        if (!empty($request->get('request'))) {
//            $parameter['req'] = $request->get('request');
//        }
//
//        $parameter['lng'] = $request->get('language')->get('visiblis_code');
//        $parameter['fmt'] = "json";
//        $parameter['crp'] = $request->get('corpus')->get('visiblis_number');
//    
//        if (!empty($request->get('block'))) {
//            $parameter['blk'] = $request->get('block');
//        }
//        
//
//        if (!empty($request->get('account_id'))) {
//            $parameter['login'] = $request->get('corpus')->get('login');
//            $parameter['pwd'] = $request->get('corpus')->get('password');
//        }
//
//        $http = new Client();
//        $address = "http://api.visiblis.net/affinite.php";
//
//        $req_response = $http->get($address, $parameter);
//
//        if ($req_response->isOk()) {
//            $json = $req_response->json;
//            if (!empty($json['keywords'])) {
//                $keywordLinkRequestsTable = TableRegistry::get('KeywordLinkRequests');
//                $keywordsTable = TableRegistry::get('Keywords');
//                foreach ($json['keywords'] as $key => $value) {
//                    $keyword = $keywordsTable
//                            ->find()
//                            ->where(['name' => $key])
//                            ->first();
//                    if (!empty($keyword)) {
//                        $keyword->updated = Time::now();
//                    } else {
//                        $keyword = $keywordsTable->newEntity([
//                            'name' => $key,
//                            'created' => Time::now()
//                        ]);
//                    }
//                    $keywordsTable->save($keyword);
//                    
//                    $keywordLinkRequest = $keywordLinkRequestsTable->newEntity([
//                        'keyword_id' => $keyword->id,
//                        'semantic_request_id' => $request->id,
//                        'count' => $request->count,
//                        'percentage' => $value,
//                        'created' => Time::now()
//                    ]);
//
//                    $keywordLinkRequestsTable->save($keywordLinkRequest);
//                }
//            } else {
//                $resp = array();
//                if (!empty($json['url'])) {
//                    $resp['url'] = $json['url'];
//                }
//
//                $resp['language_id'] = $request->get('language')->get('id');
//
//
//                if (!empty($json['as_titre'])) {
//                    $resp['as_title'] = $json['as_titre'];
//                }
//
//                if (!empty($json['as_page'])) {
//                    $resp['as_page'] = $json['as_page'];
//                }
//                if (!empty($json['as_texte'])) {
//                    $resp['as_text'] = $json['as_texte'];
//                }
//
//                $resp['semantic_request_id'] = $request['id'];
//
//                $semanticResponsesTable = TableRegistry::get('SemanticResponses');
//                $semanticResponse = $semanticResponsesTable->newEntity();
//
//                $semanticResponse = $semanticResponsesTable->patchEntity($semanticResponse, $resp);
//                $semanticResponse->count = $request->count;
//
//                if ($semanticResponsesTable->save($semanticResponse)) {
//                    $this->Flash->success(__('The semantic response has been saved.'));
//                } else {
//                    $this->Flash->error(__('The semantic request could not be saved. Please, try again.'));
//                }
//            }
//        } else {
//            if ($req_response->getStatusCode() === '404') {
//
//                $pos = strpos($req_response->body(), ";mess=");
//                $error_number = substr($req_response->body(), 4, $pos - 4);
//                $error_message = substr($req_response->body(), 11);
//
//
//                $this->Flash->error(__('The request could not be execute. Please, try again.'));
//                $this->Flash->error(__('Error number : ' . $error_number . '. Error message : ' . $error_message));
//                $this->Flash->error(__('You should check your resquet is valid.'));
//            } else {
//
//                $this->Flash->error(__('The request could not be execute. Please, try again. Error number ' . $response->getStatusCode()));
//            }
//        }
//        return $this->redirect(['action' => 'view', $request->id]);
//    }
}
