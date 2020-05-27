<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livropontos Model
 *
 * @method \App\Model\Entity\Livroponto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroponto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroponto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroponto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroponto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroponto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroponto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroponto findOrCreate($search, callable $callback = null, $options = [])
 */
class LivropontosTable extends Table
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

        $this->setTable('livropontos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		// Relacionamento entre Tabelas (ex. INNER Join)
        $this->belongsTo('Livros')
            ->setForeignKey('idlivro')
            ->setJoinType('LEFT');

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
            ->integer('idlivro')
            ->requirePresence('idlivro', 'create')
            ->notEmptyString('idlivro');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmptyString('iduser');

        $validator
            ->integer('pontos')
            ->requirePresence('pontos', 'create')
            ->notEmptyString('pontos');

        return $validator;
    }
}
