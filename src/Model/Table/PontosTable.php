<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pontos Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsToMany $Usuarios
 *
 * @method \App\Model\Entity\Ponto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ponto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ponto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ponto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ponto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ponto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ponto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ponto findOrCreate($search, callable $callback = null, $options = [])
 */
class PontosTable extends Table
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

        $this->setTable('pontos');
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
            ->integer('nova_obra')
            ->requirePresence('nova_obra', 'create')
            ->notEmptyString('nova_obra');
			
		$validator
            ->integer('link_comp')
            ->requirePresence('link_comp', 'create')
            ->notEmptyString('link_comp');
		
		$validator
            ->integer('user_bio')
            ->requirePresence('user_bio', 'create')
            ->notEmptyString('user_bio');

        $validator
            ->integer('livro_link')
            ->requirePresence('livro_link', 'create')
            ->notEmptyString('livro_link');

        $validator
            ->integer('stitulo')
            ->requirePresence('stitulo', 'create')
            ->notEmptyString('stitulo');

        $validator
            ->integer('capa')
            ->requirePresence('capa', 'create')
            ->notEmptyString('capa');

        $validator
            ->integer('autor')
            ->requirePresence('autor', 'create')
            ->notEmptyString('autor');

        $validator
            ->integer('n_paginas')
            ->requirePresence('n_paginas', 'create')
            ->notEmptyString('n_paginas');

        $validator
            ->integer('categoria')
            ->requirePresence('categoria', 'create')
            ->notEmptyString('categoria');

        $validator
            ->integer('datapub')
            ->requirePresence('datapub', 'create')
            ->notEmptyString('datapub');

        $validator
            ->integer('edicao')
            ->requirePresence('edicao', 'create')
            ->notEmptyString('edicao');

        $validator
            ->integer('editora')
            ->requirePresence('editora', 'create')
            ->notEmptyString('editora');

        $validator
            ->integer('idioma')
            ->requirePresence('idioma', 'create')
            ->notEmptyString('idioma');

        $validator
            ->integer('isbn')
            ->requirePresence('isbn', 'create')
            ->notEmptyString('isbn');

        $validator
            ->integer('serie')
            ->requirePresence('serie', 'create')
            ->notEmptyString('serie');

        $validator
            ->integer('tags')
            ->requirePresence('tags', 'create')
            ->notEmptyString('tags');

        $validator
            ->integer('sinopse')
            ->requirePresence('sinopse', 'create')
            ->notEmptyString('sinopse');

        $validator
            ->integer('avalia')
            ->requirePresence('avalia', 'create')
            ->notEmptyString('avalia');

        $validator
            ->integer('comentar')
            ->requirePresence('comentar', 'create')
            ->notEmptyString('comentar');

        $validator
            ->integer('digitalizacao')
            ->requirePresence('digitalizacao', 'create')
            ->notEmptyString('digitalizacao');

        $validator
            ->integer('autoral')
            ->requirePresence('autoral', 'create')
            ->notEmptyString('autoral');

        $validator
            ->integer('rastreio')
            ->requirePresence('rastreio', 'create')
            ->notEmptyString('rastreio');

        $validator
            ->integer('revisao')
            ->requirePresence('revisao', 'create')
            ->notEmptyString('revisao');

        $validator
            ->integer('traducao')
            ->requirePresence('traducao', 'create')
            ->notEmptyString('traducao');

        $validator
            ->integer('agraecimento')
            ->requirePresence('agraecimento', 'create')
            ->notEmptyString('agraecimento');

        $validator
            ->integer('desgosto')
            ->requirePresence('desgosto', 'create')
            ->notEmptyString('desgosto');

        $validator
            ->integer('palavraproibida')
            ->requirePresence('palavraproibida', 'create')
            ->notEmptyString('palavraproibida');
			
		$validator
            ->integer('novo_autor')
            ->requirePresence('novo_autor', 'create')
            ->notEmptyString('novo_autor');
			
		$validator
            ->integer('autor_foto')
            ->requirePresence('autor_foto', 'create')
            ->notEmptyString('autor_foto');
			
		$validator
            ->integer('autor_bio')
            ->requirePresence('autor_bio', 'create')
            ->notEmptyString('autor_bio');
			
		$validator
            ->integer('nova_cat')
            ->requirePresence('nova_cat', 'create')
            ->notEmptyString('nova_cat');
			
		$validator
            ->integer('nova_serie')
            ->requirePresence('nova_serie', 'create')
            ->notEmptyString('nova_serie');
			
		$validator
            ->integer('nova_editora')
            ->requirePresence('nova_editora', 'create')
            ->notEmptyString('nova_editora');
		
        return $validator;
    }
}
