<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Utitulos Model
 *
 * @method \App\Model\Entity\Utitulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Utitulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Utitulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Utitulo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utitulo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utitulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Utitulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Utitulo findOrCreate($search, callable $callback = null, $options = [])
 */
class UtitulosTable extends Table
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

        // Tabela com relacionamento N:N
        $this->setTable('utitulos');
        $this->setDisplayField('id_user');
        $this->setPrimaryKey(['id_user', 'id_titulo']);

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'id_user', // id local da tabela para usuarios
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Titulos', [
            'foreignKey' => 'id_titulo', // id local da tabela para titulos
            'joinType' => 'LEFT'
        ]);
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
            ->integer('id_user')
            ->allowEmptyString('id_user', null, 'create');

        $validator
            ->integer('id_titulo')
            ->allowEmptyString('id_titulo', null, 'create');

        return $validator;
    }
}
