<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dashboard Model
 *
 * @method \App\Model\Entity\Dashboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dashboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dashboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dashboard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dashboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dashboard findOrCreate($search, callable $callback = null, $options = [])
 */
class DashboardTable extends Table
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

        $this->setTable('dashboard');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		$this->belongsTo('Dashtipos')
            ->setForeignKey('solicitacao')
            ->setJoinType('INNER');
		
		$this->belongsTo('Usuarios')
            ->setForeignKey('iduser')
            ->setJoinType('INNER');
	
		// Log
        $this->belongsTo('Logs', [
            'foreignKey' => 'idmod', // id local da tabela usuarios
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
            ->integer('solicitacao')
            ->requirePresence('solicitacao', 'create')
            ->notEmptyString('solicitacao');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmptyString('iduser');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->dateTime('datainfo')
            ->requirePresence('datainfo', 'create')
            ->notEmptyDateTime('datainfo');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        return $validator;
    }
}
