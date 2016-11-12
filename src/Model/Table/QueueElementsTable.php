<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QueueElements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $SemanticCocoons
 *
 * @method \App\Model\Entity\QueueElement get($primaryKey, $options = [])
 * @method \App\Model\Entity\QueueElement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QueueElement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QueueElement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QueueElement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QueueElement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QueueElement findOrCreate($search, callable $callback = null)
 */
class QueueElementsTable extends Table
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

        $this->table('queue_elements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('SemanticCocoons', [
            'foreignKey' => 'semantic_cocoon_id',
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
            ->integer('position')
            ->allowEmpty('position')
            ->add('position', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['position']));
        $rules->add($rules->existsIn(['semantic_cocoon_id'], 'SemanticCocoons'));

        return $rules;
    }
}
