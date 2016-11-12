<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestForComments Model
 *
 * @property \Cake\ORM\Association\HasMany $HttpStatusCodes
 *
 * @method \App\Model\Entity\RequestForComment get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestForComment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestForComment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestForComment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestForComment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestForComment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestForComment findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestForCommentsTable extends Table
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

        $this->table('request_for_comments');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('HttpStatusCodes', [
            'foreignKey' => 'request_for_comment_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        return $validator;
    }
}
