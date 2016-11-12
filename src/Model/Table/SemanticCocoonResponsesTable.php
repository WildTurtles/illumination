<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SemanticCocoonResponses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SemanticCocoons
 * @property \Cake\ORM\Association\HasMany $SemanticCocoonLinks
 * @property \Cake\ORM\Association\HasMany $SemanticCocoonUniformRessourceLocators
 *
 * @method \App\Model\Entity\SemanticCocoonResponse get($primaryKey, $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SemanticCocoonResponse findOrCreate($search, callable $callback = null)
 */
class SemanticCocoonResponsesTable extends Table
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

        $this->table('semantic_cocoon_responses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('SemanticCocoons', [
            'foreignKey' => 'semantic_cocoon_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SemanticCocoonLinks', [
            'foreignKey' => 'semantic_cocoon_response_id'
        ]);
        $this->hasMany('SemanticCocoonUniformRessourceLocators', [
            'foreignKey' => 'semantic_cocoon_response_id'
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
            ->dateTime('started')
            ->allowEmpty('started');

        $validator
            ->dateTime('ended')
            ->allowEmpty('ended');

        $validator
            ->integer('count')
            ->allowEmpty('count');

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
        $rules->add($rules->existsIn(['semantic_cocoon_id'], 'SemanticCocoons'));

        return $rules;
    }
}
