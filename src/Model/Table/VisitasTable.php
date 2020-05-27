<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visitas Model
 *
 * @method \App\Model\Entity\Visita get($primaryKey, $options = [])
 * @method \App\Model\Entity\Visita newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Visita[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Visita|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visita saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Visita patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Visita[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Visita findOrCreate($search, callable $callback = null, $options = [])
 */
class VisitasTable extends Table
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

        $this->setTable('visitas');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');
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
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->scalar('page')
            ->maxLength('page', 100)
            ->requirePresence('page', 'create')
            ->notEmptyString('page');

        $validator
            ->date('data_visita')
            ->requirePresence('data_visita', 'create')
            ->notEmptyDate('data_visita');

        $validator
            ->integer('visitas')
            ->requirePresence('visitas', 'create')
            ->notEmptyString('visitas');

        return $validator;
    }
}
