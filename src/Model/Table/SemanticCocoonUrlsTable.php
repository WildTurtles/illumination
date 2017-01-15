<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SemanticCocoonUrls Model
 *
 * @property \Cake\ORM\Association\BelongsTo $HttpStatusCodes
 * @property \Cake\ORM\Association\BelongsTo $SemanticCocoonResponses
 *
 * @method \App\Model\Entity\SemanticCocoonUrl get($primaryKey, $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonUrl findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SemanticCocoonUrlsTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('semantic_cocoon_urls');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('HttpStatusCodes', [
            'foreignKey' => 'http_status_code_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SemanticCocoonResponses', [
            'foreignKey' => 'semantic_cocoon_response_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->uuid('id')
                ->allowEmpty('id', 'create');

        $validator
                ->allowEmpty('id_url_visiblis');

        $validator
                ->allowEmpty('url');

        $validator
                ->integer('clusters')
                ->allowEmpty('clusters');

        $validator
                ->decimal('as_title')
                ->allowEmpty('as_title');

        $validator
                ->decimal('as_page')
                ->allowEmpty('as_page');

        $validator
                ->decimal('title_semantic_rank')
                ->allowEmpty('title_semantic_rank');

        $validator
                ->decimal('page_semantic_rank')
                ->allowEmpty('page_semantic_rank');

        $validator
                ->decimal('page_rank')
                ->allowEmpty('page_rank');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['http_status_code_id'], 'HttpStatusCodes'));
        $rules->add($rules->existsIn(['semantic_cocoon_response_id'], 'SemanticCocoonResponses'));

        return $rules;
    }

}
