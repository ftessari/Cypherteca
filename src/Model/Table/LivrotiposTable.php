<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livrotipos Model
 *
 * @method \App\Model\Entity\Livrotipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livrotipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livrotipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livrotipo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrotipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrotipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livrotipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livrotipo findOrCreate($search, callable $callback = null, $options = [])
 */
class LivrotiposTable extends Table
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

        $this->setTable('livrotipos');
        $this->setDisplayField('tipo');
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
            ->scalar('tipo')
            ->maxLength('tipo', 150)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 500)
            ->allowEmptyString('descricao');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['tipo']));

        return $rules;
    }
}
