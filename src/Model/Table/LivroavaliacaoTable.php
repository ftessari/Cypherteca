<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livroavaliacao Model
 *
 * @method \App\Model\Entity\Livroavaliacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livroavaliacao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livroavaliacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livroavaliacao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroavaliacao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livroavaliacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livroavaliacao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livroavaliacao findOrCreate($search, callable $callback = null, $options = [])
 */
class LivroavaliacaoTable extends Table
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

        $this->setTable('livroavaliacao');
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
            ->integer('id_livro')
            ->requirePresence('id_livro', 'create')
            ->notEmptyString('id_livro');

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmptyString('id_user');

        $validator
            ->integer('positivo')
            ->allowEmptyString('positivo');

        $validator
            ->integer('negativo')
            ->allowEmptyString('negativo');

        return $validator;
    }
}
