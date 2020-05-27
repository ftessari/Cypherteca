<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Subtitulosite Model
 *
 * @method \App\Model\Entity\Subtitulosite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subtitulosite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subtitulosite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subtitulosite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subtitulosite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subtitulosite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subtitulosite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subtitulosite findOrCreate($search, callable $callback = null, $options = [])
 */
class SubtitulositeTable extends Table
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

        $this->setTable('subtitulosite');
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
            ->scalar('frase')
            ->maxLength('frase', 500)
            ->requirePresence('frase', 'create')
            ->notEmptyString('frase');

        return $validator;
    }

    // Frases de subtitulo (default.ctp)
    public function frases()
    {
        $userDB = TableRegistry::getTableLocator()->get('Subtitulosite');

        return $userDB->find('all', ['order' => 'rand()'])->first();
    }
}
