<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Muralrespostas Model
 *
 * @method \App\Model\Entity\Muralresposta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Muralresposta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Muralresposta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Muralresposta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Muralresposta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Muralresposta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Muralresposta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Muralresposta findOrCreate($search, callable $callback = null, $options = [])
 */
class MuralrespostasTable extends Table
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

        $this->setTable('muralrespostas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios')
            ->setForeignKey('iduser')
            ->setJoinType('INNER');
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
            ->scalar('texto')
            ->requirePresence('texto', 'create')
            ->notEmptyString('texto');

        $validator
            ->dateTime('dataini')
            ->notEmptyDateTime('dataini');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmptyString('iduser');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('dataalt')
            ->allowEmptyDateTime('dataalt');

        $validator
            ->integer('idmural')
            ->requirePresence('idmural', 'create')
            ->notEmptyString('idmural');

        $validator
            ->integer('moderador')
            ->allowEmptyString('moderador');

        return $validator;
    }
}
