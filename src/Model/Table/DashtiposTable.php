<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dashtipos Model
 *
 * @method \App\Model\Entity\Dashtipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dashtipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dashtipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dashtipo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dashtipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dashtipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dashtipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dashtipo findOrCreate($search, callable $callback = null, $options = [])
 */
class DashtiposTable extends Table
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

        $this->setTable('dashtipos');
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
            ->maxLength('tipo', 300)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        return $validator;
    }
}
