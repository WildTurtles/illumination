<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SemanticCocoons Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Languages
 * @property \Cake\ORM\Association\BelongsTo $Corpuses
 * @property \Cake\ORM\Association\BelongsTo $Accounts
 * @property \Cake\ORM\Association\BelongsTo $CocoonCategories
 * @property \Cake\ORM\Association\HasMany $QueueElements
 * @property \Cake\ORM\Association\HasMany $SemanticCocoonResponses
 *
 * @method \App\Model\Entity\SemanticCocoon get($primaryKey, $options = [])
 * @method \App\Model\Entity\SemanticCocoon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SemanticCocoon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SemanticCocoon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoon findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SemanticCocoonsTable extends Table
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

        $this->table('semantic_cocoons');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Corpuses', [
            'foreignKey' => 'corpus_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Accounts', [
            'foreignKey' => 'account_id'
        ]);
        $this->belongsTo('CocoonCategories', [
            'foreignKey' => 'cocoon_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('QueueElements', [
            'foreignKey' => 'semantic_cocoon_id'
        ]);
        $this->hasMany('SemanticCocoonResponses', [
            'foreignKey' => 'semantic_cocoon_id'
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
            ->allowEmpty('name');

        $validator
            ->integer('count')
            ->allowEmpty('count');

        $validator
            ->allowEmpty('url');

        $validator
            ->allowEmpty('request');

        $validator
            ->integer('clusters')
            ->allowEmpty('clusters');

        $validator
            ->allowEmpty('regular_expression');

        $validator
            ->boolean('exclusive')
            ->allowEmpty('exclusive');

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
        $rules->add($rules->existsIn(['corpus_id'], 'Corpuses'));
        $rules->add($rules->existsIn(['account_id'], 'Accounts'));
        $rules->add($rules->existsIn(['cocoon_category_id'], 
'CocoonCategories'));

        return $rules;
    }
}
