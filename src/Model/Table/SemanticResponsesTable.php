<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SemanticResponses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Languages
 * @property \Cake\ORM\Association\BelongsTo $SemanticRequests
 *
 * @method \App\Model\Entity\SemanticResponse get($primaryKey, $options = [])
 * @method \App\Model\Entity\SemanticResponse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SemanticResponse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SemanticResponse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SemanticResponse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticResponse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticResponse findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SemanticResponsesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('semantic_responses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SemanticRequests', [
            'foreignKey' => 'semantic_request_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('count');

        $validator
            ->allowEmpty('url');

        $validator
            ->decimal('as_title')
            ->allowEmpty('as_title');

        $validator
            ->decimal('as_page')
            ->allowEmpty('as_page');

        $validator
            ->decimal('as_text')
            ->allowEmpty('as_text');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['semantic_request_id'], 'SemanticRequests'));

        return $rules;
    }
}
