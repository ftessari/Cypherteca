<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livrolinks Model
 *
 * @method \App\Model\Entity\Livrolink get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livrolink newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livrolink[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livrolink|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrolink saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrolink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livrolink[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livrolink findOrCreate($search, callable $callback = null, $options = [])
 */
class LivrolinksTable extends Table
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

        $this->setTable('livrolinks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		$this->belongsTo('Livroformatos')
            ->setForeignKey('idformato')
            ->setJoinType('INNER');
		
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
            ->scalar('link')
            ->maxLength('link', 300)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->integer('idformato')
            ->requirePresence('idformato', 'create')
            ->notEmptyString('idformato');

        $validator
            ->integer('idlivro')
            ->requirePresence('idlivro', 'create')
            ->notEmptyString('idlivro');

        $validator
            ->integer('iduser')
            ->requirePresence('iduser', 'create')
            ->notEmptyString('iduser');

        $validator
            ->dateTime('dataenvio')
            ->requirePresence('dataenvio', 'create')
            ->notEmptyDateTime('dataenvio');

        return $validator;
    }
}
