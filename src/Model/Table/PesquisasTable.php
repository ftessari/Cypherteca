<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Pesquisas Model
 *
 * @method \App\Model\Entity\Pesquisa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pesquisa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pesquisa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pesquisa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pesquisa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pesquisa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pesquisa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pesquisa findOrCreate($search, callable $callback = null, $options = [])
 */
class PesquisasTable extends Table
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

        $this->setTable('pesquisas');
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
            ->integer('id_user')
            ->allowEmptyString('id_user');

        $validator
            ->scalar('termo')
            ->maxLength('termo', 300)
            ->requirePresence('termo', 'create')
            ->notEmptyString('termo');

        $validator
            ->dateTime('datainfo')
            ->requirePresence('datainfo', 'create')
            ->notEmptyDateTime('datainfo');

        return $validator;
    }

    public function ultimasPesquisas()
    {
        $pesquisaDB = TableRegistry::getTableLocator()->get('Pesquisas');

        return $pesquisaDB->find('all', [
            'order' => ['Pesquisas.datainfo' => 'DESC'],
            'limit' => 15
        ])
		->distinct(['termo']);

    }
}
