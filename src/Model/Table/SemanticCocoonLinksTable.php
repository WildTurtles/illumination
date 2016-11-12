<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SemanticCocoonLinks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SemanticCocoonResponses
 *
 * @method \App\Model\Entity\SemanticCocoonLink get($primaryKey, $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonLink findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SemanticCocoonLinksTable extends Table
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

        $this->table('semantic_cocoon_links');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('source');

        $validator
            ->allowEmpty('destination');

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
        $rules->add($rules->existsIn(['semantic_cocoon_response_id'], 'SemanticCocoonResponses'));

        return $rules;
    }
}
