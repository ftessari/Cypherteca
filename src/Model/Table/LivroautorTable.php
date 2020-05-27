<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livroautor Model
 *
 * @method \App\Model\Entity\Livroautor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroautor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroautor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroautor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroautor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroautor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroautor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroautor findOrCreate($search, callable $callback = null, $options = [])
 */
class LivroautorTable extends Table
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

        $this->setTable('livroautor');
        $this->setDisplayField('autor');
        $this->setPrimaryKey('id');

        $this->belongsTo('Livros')
            ->setForeignKey('id')
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
            ->scalar('autor')
            ->maxLength('autor', 150)
            ->requirePresence('autor', 'create')
            ->notEmptyString('autor');

        $validator
            ->scalar('link')
            ->maxLength('link', 300)
            ->allowEmptyString('link');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['autor']));

        return $rules;
    }
}
