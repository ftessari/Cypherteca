<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Geral Model
 *
 * @method \App\Model\Entity\Geral get($primaryKey, $options = [])
 * @method \App\Model\Entity\Geral newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Geral[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Geral|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Geral saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Geral patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Geral[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Geral findOrCreate($search, callable $callback = null, $options = [])
 */
class GeralTable extends Table
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

        $this->setTable('geral');
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

      /*  $validator
            ->scalar('logo')
            ->maxLength('logo', 10)
            ->requirePresence('logo', 'create')
            ->notEmptyString('logo');

        $validator
            ->scalar('sub_titulo')
            ->maxLength('sub_titulo', 300)
            ->allowEmptyString('sub_titulo');

        $validator
            ->scalar('livro_capa_padrao')
            ->maxLength('livro_capa_padrao', 10)
            ->allowEmptyString('livro_capa_padrao');

        $validator
            ->numeric('livro_capa_tamanho')
            ->requirePresence('livro_capa_tamanho', 'create')
            ->notEmptyString('livro_capa_tamanho');

        $validator
            ->integer('livro_capa_max_x')
            ->requirePresence('livro_capa_max_x', 'create')
            ->notEmptyString('livro_capa_max_x');

        $validator
            ->integer('livro_capa_max_y')
            ->requirePresence('livro_capa_max_y', 'create')
            ->notEmptyString('livro_capa_max_y');

        $validator
            ->integer('livro_capa_min_x')
            ->requirePresence('livro_capa_min_x', 'create')
            ->notEmptyString('livro_capa_min_x');

        $validator
            ->integer('livro_capa_min_y')
            ->requirePresence('livro_capa_min_y', 'create')
            ->notEmptyString('livro_capa_min_y');

        $validator
            ->scalar('avatar_padrao')
            ->maxLength('avatar_padrao', 10)
            ->allowEmptyString('avatar_padrao');

        $validator
            ->numeric('avatar_tamanho')
            ->requirePresence('avatar_tamanho', 'create')
            ->notEmptyString('avatar_tamanho');

        $validator
            ->integer('avatar_max_x')
            ->requirePresence('avatar_max_x', 'create')
            ->notEmptyString('avatar_max_x');

        $validator
            ->integer('avatar_max_y')
            ->requirePresence('avatar_max_y', 'create')
            ->notEmptyString('avatar_max_y');

        $validator
            ->integer('avatar_min_x')
            ->requirePresence('avatar_min_x', 'create')
            ->notEmptyString('avatar_min_x');

        $validator
            ->integer('avatar_min_y')
            ->requirePresence('avatar_min_y', 'create')
            ->notEmptyString('avatar_min_y');

        $validator
            ->scalar('info_lateral')
            ->allowEmptyString('info_lateral');

        $validator
            ->scalar('rodape')
            ->allowEmptyString('rodape'); */

        return $validator;
    }
}
