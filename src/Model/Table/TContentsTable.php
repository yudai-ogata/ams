<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Schema\Table as Schema;

/**
 * TContents Model
 *
 * @method \App\Model\Entity\TContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\TContent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TContent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TContent|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TContent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TContent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TContentsTable extends Table
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

        $this->setTable('t_contents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('name_kana')
            ->maxLength('name_kana', 255)
            ->allowEmpty('name_kana');

        $validator
            ->integer('age')
            ->maxLength('age', 255)
            ->allowEmpty('age');

        $validator
            ->integer('gender')
            ->allowEmpty('gender');

        $validator
            ->scalar('tel')
            ->maxLength('tel', 255)
            ->allowEmpty('tel');

        $validator
            ->scalar('zip')
            ->maxLength('zip', 255)
            ->allowEmpty('zip');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('domain')
            ->maxLength('domain', 255)
            ->requirePresence('domain', 'create')
            ->notEmpty('domain');

        $validator
            ->scalar('param')
            ->maxLength('param', 255)
            ->requirePresence('param', 'create')
            ->notEmpty('param');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 255)
            ->allowEmpty('product_name');

        $validator
            ->integer('number1')
            ->allowEmpty('number1');

        $validator
            ->integer('number2')
            ->allowEmpty('number2');

        $validator
            ->integer('number3')
            ->allowEmpty('number3');

        $validator
            ->scalar('detail1')
            ->allowEmpty('detail1');

        $validator
            ->scalar('detail2')
            ->allowEmpty('detail2');

        $validator
            ->scalar('detail3')
            ->allowEmpty('detail3');

        $validator
            ->scalar('detail4')
            ->allowEmpty('detail4');

        $validator
            ->scalar('detail5')
            ->allowEmpty('detail5');

        $validator
            ->boolean('deleted')
            ->allowEmpty('deleted');

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
        return $rules;
    }
}
