<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Palavrasproibidas Model
 *
 * @method \App\Model\Entity\Palavrasproibida get($primaryKey, $options = [])
 * @method \App\Model\Entity\Palavrasproibida newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Palavrasproibida[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Palavrasproibida|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Palavrasproibida saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Palavrasproibida patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Palavrasproibida[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Palavrasproibida findOrCreate($search, callable $callback = null, $options = [])
 */
class PalavrasproibidasTable extends Table
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

        $this->setTable('palavrasproibidas');
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
            ->scalar('palavra')
            ->maxLength('palavra', 100)
            ->requirePresence('palavra', 'create')
            ->notEmptyString('palavra');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['palavra']));

        return $rules;
    }
}
