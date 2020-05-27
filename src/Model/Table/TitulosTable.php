<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Titulos Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Titulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Titulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Titulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Titulo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Titulo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Titulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Titulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Titulo findOrCreate($search, callable $callback = null, $options = [])
 */
class TitulosTable extends Table
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

        $this->setTable('titulos');
        $this->setDisplayField('designacao');
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
            ->scalar('designacao')
            ->maxLength('designacao', 300)
            ->requirePresence('designacao', 'create')
            ->notEmptyString('designacao');
        /*
                $validator
                    ->scalar('descricao')
                    ->allowEmptyString('descricao');

                $validator
                    ->scalar('exigencia')
                    ->allowEmptyString('exigencia');

                $validator
                    ->requirePresence('icone', 'create')
                    ->notEmptyString('icone');
             */

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['designacao']));

        return $rules;
    }
}
