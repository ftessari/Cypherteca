<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\PontosTable&\Cake\ORM\Association\BelongsToMany $Pontos
 * @property \App\Model\Table\StatusTable&\Cake\ORM\Association\BelongsToMany $Status
 * @property \App\Model\Table\TitulosTable&\Cake\ORM\Association\BelongsToMany $Titulos
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

    /*    $this->belongsToMany('Pontos', [
            'foreignKey' => 'id_user',
            'targetForeignKey' => 'id',
            'joinTable' => 'upontos'
        ]); */
        $this->belongsTo('Status', [
            'foreignKey' => 'status',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Titulos', [
            'foreignKey' => 'id_user',
            'targetForeignKey' => 'id_titulo',
            'joinTable' => 'utitulos'
        ]);
		
		// Relacionamento entre Tabelas (ex. INNER Join)
		$this->belongsTo('Utipos', [
            'foreignKey' => 'tipo',
            'joinType' => 'INNER'
        ]);

		$this->belongsTo('Ustatus', [
            'foreignKey' => 'id',
            'joinType' => 'LEFT'
        ]);

        $this->belongsTo('Utitulos', [
            'foreignKey' => 'id', // id local da tabela usuarios
            'joinType' => 'LEFT'
        ]);

		// Log
        $this->belongsTo('Logs', [
            'foreignKey' => 'id', // id local da tabela usuarios
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create')
    
            ->scalar('nome')
            ->maxLength('nome', 300)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome')
			
            ->scalar('login')
            ->maxLength('login', 150)
            ->requirePresence('login', 'create')
            ->notEmptyString('login')
			
            ->notEmpty('senha', 'Teste 1')
			->notEmpty('senha2', 'Teste 2')
			->add('senha2',
				[
					'lengthBetween' => [
							'rule' => ['lengthBetween', 6, 20],
							'message' => __('A senha deve conter de 6 a 20 caracteres.')
					],
					'equalToSenha' => [
						'rule' => function ($value, $context){
							return $value === $context['data']['senha'];
						},
						'message' => __('As senhas não correspondem.')
					]
				])				
			
          /*  ->date('datanasci')
            ->allowEmptyDate('datanasci')
			
            ->date('dataini')
            ->requirePresence('dataini', 'create')
            ->notEmptyDate('dataini')
			
            ->dateTime('dataultimo')
            ->allowEmptyDateTime('dataultimo')
			
            ->integer('tipo')
            ->notEmptyString('tipo')
			
            ->scalar('bio')
            ->allowEmptyString('bio')
			
			->scalar('site')
            ->maxLength('site', 300)
            ->allowEmptyString('site')
			
            ->scalar('telegram')
            ->maxLength('telegram', 300)
            ->allowEmptyString('telegram')
			
            ->allowEmptyString('avatar')
			
            ->integer('status')
            ->notEmptyString('status')
			
            ->scalar('informe_admin')
            ->allowEmptyString('informe_admin')
			*/
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

            // Campo para array de imagem [avatar]
          //  ->requirePresence('image[]', 'create')
          //  ->notEmpty('image');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {        
        $rules->add($rules->isUnique(['email', 'login']));

        return $rules;
    }

    // Ultimos usuários cadastrados (default.ctp)
    public function userID()
    {
        $userDB = TableRegistry::getTableLocator()->get('Usuarios');

        return $userDB->find('all', [
            'order' => ['Usuarios.id' => 'DESC'],
            'limit' => 10
        ]);
    }

    // Rank de atividades de usuários (default.ctp)
    public function userATV()
    {
        $userDB = TableRegistry::getTableLocator()->get('Usuarios');

        return $userDB->find('all', [
            'order' => ['Usuarios.pontos' => 'DESC'],
            'limit' => 10
        ]);
    }

    // Rank de gratidão (default.ctp)
    public function userRH()
    {
        $userDB = TableRegistry::getTableLocator()->get('Usuarios');

        return $userDB->find('all', [
            'order' => ['Usuarios.heart' => 'DESC'],
            'limit' => 10
        ]);
    }

    // Mostra quantidade (default.ctp)
    public function useCount()
    {
        $userDB = TableRegistry::getTableLocator()->get('Usuarios');

        return $userDB->find('all')->count();
    }
	
}
