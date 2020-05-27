<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livroformatos Model
 *
 * @method \App\Model\Entity\Livroformato get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroformato newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroformato[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroformato|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroformato saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroformato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroformato[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroformato findOrCreate($search, callable $callback = null, $options = [])
 */
class LivroformatosTable extends Table
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

        $this->setTable('livroformatos');
        $this->setDisplayField('ext');
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
            ->scalar('ext')
            ->maxLength('ext', 7)
            ->requirePresence('ext', 'create')
            ->notEmptyString('ext');

        $validator
            ->scalar('software')
            ->maxLength('software', 150)
            ->allowEmptyString('software');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['ext']));

        return $rules;
    }
}
