<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NotificationTexts Model
 *
 * @property \Cake\ORM\Association\HasMany $Notifications
 *
 * @method \App\Model\Entity\NotificationText get($primaryKey, $options = [])
 * @method \App\Model\Entity\NotificationText newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NotificationText[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NotificationText|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NotificationText patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationText[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NotificationText findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificationTextsTable extends Table
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

        $this->table('notification_texts');
        $this->displayField('name');
        $this->primaryKey('uuid');

        $this->addBehavior('Timestamp');

        $this->hasMany('Notifications', [
            'foreignKey' => 'notification_text_id'
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
            ->uuid('uuid')
            ->allowEmpty('uuid', 'create');

        $validator
            ->allowEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
