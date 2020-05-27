<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Livroserie Model
 *
 * @method \App\Model\Entity\Livroserie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroserie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroserie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroserie|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroserie saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroserie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroserie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroserie findOrCreate($search, callable $callback = null, $options = [])
 */
class LivroserieTable extends Table
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

        $this->setTable('livroserie');
        $this->setDisplayField('serie');
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
            ->scalar('serie')
            ->maxLength('serie', 300)
            ->requirePresence('serie', 'create')
            ->notEmptyString('serie');

        return $validator;
    }

    // Mostra quantidade (default.ctp)
    public function serCount()
    {
        $serDB = TableRegistry::getTableLocator()->get('Livroserie');

        return $serDB->find('all')->count();
    }
}
