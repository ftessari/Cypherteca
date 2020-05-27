<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livroidioma Model
 *
 * @method \App\Model\Entity\Livroidioma get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroidioma newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroidioma[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroidioma|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroidioma saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroidioma patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroidioma[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroidioma findOrCreate($search, callable $callback = null, $options = [])
 */
class LivroidiomaTable extends Table
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

        $this->setTable('livroidioma');
        $this->setDisplayField('idioma');
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
            ->scalar('idioma')
            ->maxLength('idioma', 150)
            ->requirePresence('idioma', 'create')
            ->notEmptyString('idioma');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['idioma']));

        return $rules;
    }
}
