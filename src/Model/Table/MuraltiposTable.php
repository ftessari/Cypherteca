<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Muraltipos Model
 *
 * @method \App\Model\Entity\Muraltipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Muraltipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Muraltipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Muraltipo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Muraltipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Muraltipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Muraltipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Muraltipo findOrCreate($search, callable $callback = null, $options = [])
 */
class MuraltiposTable extends Table
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

        $this->setTable('muraltipos');
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

        return $validator;
    }
}
