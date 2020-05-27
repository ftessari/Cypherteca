<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Livrocat Model
 *
 * @method \App\Model\Entity\Livrocat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livrocat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livrocat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livrocat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrocat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livrocat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livrocat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livrocat findOrCreate($search, callable $callback = null, $options = [])
 */
class LivrocatTable extends Table
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

        $this->setTable('livrocat');
        $this->setDisplayField('categoria');
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
            ->scalar('categoria')
            ->maxLength('categoria', 100)
            ->requirePresence('categoria', 'create')
            ->notEmptyString('categoria');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['categoria']));

        return $rules;
    }

    // Mostra quantidade (default.ctp)
    public function catCount()
    {
        $catDB = TableRegistry::getTableLocator()->get('Livrocat');

        return $catDB->find('all')->count();
    }
}
