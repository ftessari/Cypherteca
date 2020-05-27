<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Logs Model
 *
 * @method \App\Model\Entity\Log get($primaryKey, $options = [])
 * @method \App\Model\Entity\Log newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Log[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Log|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Log saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Log patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Log[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Log findOrCreate($search, callable $callback = null, $options = [])
 */
class LogsTable extends Table
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

        $this->setTable('logs');
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
            ->integer('quem')
            ->requirePresence('quem', 'create')
            ->notEmptyString('quem');

        $validator
            ->dateTime('quando')
            ->requirePresence('quando', 'create')
            ->notEmptyDateTime('quando');

        $validator
            ->integer('onde')
            ->requirePresence('onde', 'create')
            ->notEmptyString('onde');

        $validator
            ->scalar('o_que')
            ->maxLength('o_que', 300)
            ->requirePresence('o_que', 'create')
            ->notEmptyString('o_que');

        $validator
            ->integer('pontos')
            ->requirePresence('pontos', 'create')
            ->notEmptyString('pontos');

        $validator
            ->scalar('argumento_extra')
            ->maxLength('argumento_extra', 130)
            ->allowEmptyString('argumento_extra');

        return $validator;
    }

    // Log
    public function log_rec($quem = '', $quando = 0, $onde = '', $o_que = '', $pontos = 0, $argumento_extra = '')
    {
        $log_rec = TableRegistry::get('Logs');
        $log = $log_rec->newEntity();

        $log->quem 			  = $quem;
        $log->quando 	      = $quando;
        $log->onde 	          = $onde;
        $log->o_que 	      = $o_que;
        $log->pontos 	      = $pontos;
        $log->argumento_extra = $argumento_extra;

        $log_rec->save($log);
    }
}
