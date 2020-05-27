<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Umail Model
 *
 * @method \App\Model\Entity\Umail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Umail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Umail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Umail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Umail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Umail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Umail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Umail findOrCreate($search, callable $callback = null, $options = [])
 */
class UmailTable extends Table
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

        $this->setTable('umail');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
		
		
		$this->belongsTo('Usuarios')
            ->setForeignKey('de')
		//	->belongsToMany('para') = getNome Função para pegar outr nome da mesma tabela
            ->setJoinType('INNER'); 
			
		/*$this->hasMany('Usuarios')
			->setForeignKey(['id'])
			->setJoinType('INNER'); */
		
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
            ->scalar('titulo')
            ->maxLength('titulo', 300)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->integer('de')
            ->requirePresence('de', 'create')
            ->notEmptyString('de');

        $validator
            ->integer('para')
            ->requirePresence('para', 'create')
            ->notEmptyString('para');

        $validator
            ->scalar('texto')
            ->requirePresence('texto', 'create')
            ->notEmptyString('texto');

        $validator
            ->dateTime('data_envio')
            ->requirePresence('data_envio', 'create')
            ->notEmptyDateTime('data_envio');
/* 
        $validator
            ->dateTime('data_lido')
            ->allowEmptyDateTime('data_lido');
 */

        return $validator;
    }

    public function getNome($id){
        $userDB = TableRegistry::getTableLocator()->get('Usuarios');
        $user =  $userDB->get($id);
        return $user->nome;
    }
	
	// Atribuir como lido à mensagem
    public function lido($id = 0) {
		    $grava_lido = TableRegistry::getTableLocator()->get('Umail');
            $lido = $grava_lido->get($id);

            $lido->data_lido = date('Y-m-d H:i');

            $grava_lido->save($lido);
    }

    // Mostra se tem novo email (default.ctp)
    public function countMail($id = 0) {
        $dbumail = TableRegistry::getTableLocator()->get('Umail');

        return $dbumail->find('all')->where([
            'and' => [
                'Umail.para' => $id,
                'Umail.ativo' => 1,
                'Umail.data_lido IS NULL'
            ]
        ])->count();
    }

    // Email de boas vindas
    public function bemvindo($id = 0) {
        $dbumail = TableRegistry::getTableLocator()->get('Umail');

       // $mail = $dbumail->get($id); // Edit
        $mail = $dbumail->newEntity();

        $mail->titulo = 'Olá. Bem-vindo! :)';
        $mail->de = 1;// Tecarina
        $mail->para = $id;
        $mail->texto = "MSG_BEMVINDO_TECA";
        $mail->data_envio = date('Y-m-d H:i');
       // $mail->data_lido = date('Y-m-d H:i');
        $mail->idresp = -1;
        $mail->ativo = 1;

        $dbumail->save($mail);
    }
}
