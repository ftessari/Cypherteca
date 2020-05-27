<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mural Model
 *
 * @method \App\Model\Entity\Mural get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mural newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mural[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mural|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mural saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mural patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mural[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mural findOrCreate($search, callable $callback = null, $options = [])
 */
class MuralTable extends Table
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

        $this->setTable('mural');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        $this->belongsTo('Muraltipos')
            ->setForeignKey('idtipo')
            ->setJoinType('INNER');

        $this->belongsTo('Usuarios')
            ->setForeignKey('iduser')
            ->setJoinType('INNER');

        // Log
        $this->belongsTo('Logs', [
            'foreignKey' => 'iduser', // id do usuario
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 300)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('texto')
            ->requirePresence('texto', 'create')
            ->notEmptyString('texto');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmptyString('iduser');

        $validator
            ->integer('idtipo')
            ->requirePresence('idtipo', 'create')
            ->notEmptyString('idtipo');

        return $validator;
    }
}
