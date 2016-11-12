<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HttpStatusCodes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequestForComments
 *
 * @method \App\Model\Entity\HttpStatusCode get($primaryKey, $options = [])
 * @method \App\Model\Entity\HttpStatusCode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HttpStatusCode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HttpStatusCode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HttpStatusCode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HttpStatusCode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HttpStatusCode findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HttpStatusCodesTable extends Table
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

        $this->table('http_status_codes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequestForComments', [
            'foreignKey' => 'request_for_comment_id',
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['request_for_comment_id'], 'RequestForComments'));

        return $rules;
    }
}
