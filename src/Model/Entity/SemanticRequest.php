<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * SemanticRequest Entity
 *
 * @property string $id
 * @property string $name
 * @property int $count
 * @property string $category_id
 * @property string $field
 * @property string $request
 * @property string $block
 * @property string $language_id
 * @property string $corpus_id
 * @property string $account_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Corpus $corpus
 * @property \App\Model\Entity\Account $account
 */
class SemanticRequest extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    public function setParameters($request, $configuration) {
        $parameter = array();

        $parameter['key'] = $configuration->visiblis_api_key;
        $parameter[$request->get('category')->get('visiblis_api_code')] = $request->get('field');

        if (!empty($request->get('request'))) {
            $parameter['req'] = $request->get('request');
        }

        $parameter['lng'] = $request->get('language')->get('visiblis_code');
        $parameter['fmt'] = "json";
        $parameter['crp'] = $request->get('corpus')->get('visiblis_number');

        if (!empty($request->get('block'))) {
            $parameter['blk'] = $request->get('block');
        }

        if (!empty($request->get('account_id'))) {
            $parameter['login'] = $request->get('corpus')->get('login');
            $parameter['pwd'] = $request->get('corpus')->get('password');
        }
        return $parameter;
    }

    public function sendRequest($parameter) {
        $http = new Client();
        //TODO Create a sql table in order to map urls 
        $address = "http://api.visiblis.net/affinite.php";

        $req_response = $http->get($address, $parameter);

        return $req_response;
    }

    public function keywords($json, $request) {
        $keywordLinkRequestsTable = TableRegistry::get('KeywordLinkRequests');
        $keywordsTable = TableRegistry::get('Keywords');
        foreach ($json['keywords'] as $key => $value) {
            $keyword = $keywordsTable
                    ->find()
                    ->where(['name' => $key])
                    ->first();
            if (!empty($keyword)) {
                $keyword->updated = Time::now();
            } else {
                $keyword = $keywordsTable->newEntity([
                    'name' => $key,
                    'created' => Time::now()
                ]);
            }
            $keywordsTable->save($keyword);

            $keywordLinkRequest = $keywordLinkRequestsTable->newEntity([
                'keyword_id' => $keyword->id,
                'semantic_request_id' => $request->id,
                'count' => $request->count,
                'percentage' => $value,
                'created' => Time::now()
            ]);

            $keywordLinkRequestsTable->save($keywordLinkRequest);
        }
    }

    public function keywordLinks($json, $request) {
        $resp = array();
        if (!empty($json['url'])) {
            $resp['url'] = $json['url'];
        }
        $resp['language_id'] = $request->get('language')->get('id');
        if (!empty($json['as_titre'])) {
            $resp['as_title'] = $json['as_titre'];
        }
        if (!empty($json['as_page'])) {
            $resp['as_page'] = $json['as_page'];
        }
        if (!empty($json['as_texte'])) {
            $resp['as_text'] = $json['as_texte'];
        }
        $resp['semantic_request_id'] = $request['id'];

        return $resp;
    }

    public function parseError($message) {
        $pos = strpos($message, ";mess=");
        $result = array();
        
        $result['number'] = substr($message, 4, $pos - 4);
        $result['message'] = substr($message, 11);
        
        return $result;
        
    }

}
