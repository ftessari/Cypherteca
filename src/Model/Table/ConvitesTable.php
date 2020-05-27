<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Convites Model
 *
 * @method \App\Model\Entity\Convite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Convite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Convite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Convite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Convite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Convite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Convite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Convite findOrCreate($search, callable $callback = null, $options = [])
 */
class ConvitesTable extends Table
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

        $this->setTable('convites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmptyString('id_user');

        $validator
            ->dateTime('data_ini')
            ->requirePresence('data_ini', 'create')
            ->notEmptyDateTime('data_ini');

        $validator
            ->scalar('convite')
            ->maxLength('convite', 300)
            ->requirePresence('convite', 'create')
            ->notEmptyString('convite');

        $validator
            ->dateTime('data_criacao')
            ->requirePresence('data_criacao', 'create')
            ->notEmptyDateTime('data_criacao');

        $validator
            ->integer('usado')
            ->notEmptyString('usado');

        return $validator;
    }
}
