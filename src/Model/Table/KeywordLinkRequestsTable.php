<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KeywordLinkRequests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Keywords
 * @property \Cake\ORM\Association\BelongsTo $SemanticRequests
 *
 * @method \App\Model\Entity\KeywordLinkRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\KeywordLinkRequest findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KeywordLinkRequestsTable extends Table
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

        $this->table('keyword_link_requests');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Keywords', [
            'foreignKey' => 'keyword_id',
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
            ->decimal('percentage')
            ->allowEmpty('percentage');

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
        $rules->add($rules->existsIn(['keyword_id'], 'Keywords'));
        $rules->add($rules->existsIn(['semantic_request_id'], 'SemanticRequests'));

        return $rules;
    }
}
