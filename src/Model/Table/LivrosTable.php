<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Livros Model
 *
 * @method \App\Model\Entity\Livro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livro findOrCreate($search, callable $callback = null, $options = [])
 */
class LivrosTable extends Table
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

        $this->setTable('livros');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');

        // Relacionamento entre Tabelas (ex. INNER Join)
        $this->belongsTo('Livrocat')
            ->setForeignKey('idcategoria')
            ->setJoinType('INNER');

        $this->belongsTo('Livroautor')
            ->setForeignKey('idautor')
            ->setJoinType('INNER');

        $this->belongsTo('Livroidioma')
            ->setForeignKey('ididioma')
            ->setJoinType('INNER');

        $this->belongsTo('Livrotipos')
            ->setForeignKey('idtipo')
            ->setJoinType('INNER');

        $this->belongsTo('Livroeditoras')
            ->setForeignKey('ideditora')
            ->setJoinType('INNER');

        $this->belongsTo('Livroserie')
            ->setForeignKey('idserie')
            ->setJoinType('INNER');

        $this->belongsTo('Livrolinks')
            ->setForeignKey('idlivro')
            ->setJoinType('INNER');

        $this->belongsTo('Livrolinks')
            ->setForeignKey('id')
            ->setJoinType('INNER');

        $this->belongsTo('Livropontos')
            ->setForeignKey('id')
            ->setJoinType('LEFT');


        /*$this->belongsTo('Livrocomentarios')
            ->setForeignKey('id') // Livrocomentarios.id
            ->setBindingKey('id_livro') // FK da tabela Livrocomentarios.id_livro = livros.id
            ->setJoinType('RIGHT');*/

        /*$this->belongsTo('Usuarios')
            ->setForeignKey('id')
            ->setBindingKey('id_user')
            ->setJoinType('RIGHT');*/
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
            ->maxLength('titulo', 150)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        /*    $validator
                ->scalar('subtitulo')
                ->maxLength('subtitulo', 300)
                ->allowEmptyString('subtitulo');

            $validator
                ->scalar('sinopse')
                ->allowEmptyString('sinopse');

            $validator
                ->date('ano')
                ->allowEmptyDate('ano');

            $validator
                ->integer('idioma')
                ->allowEmptyString('idioma');

            $validator
                ->integer('n_pag')
                ->allowEmptyString('n_pag');

            $validator
                ->integer('editora')
                ->allowEmptyString('editora');

            $validator
                ->integer('ISBN')
                ->allowEmptyString('ISBN');

            $validator
                ->integer('autor')
                ->allowEmptyString('autor');

            $validator
                ->scalar('link_comp')
                ->maxLength('link_comp', 500)
                ->allowEmptyString('link_comp');

            $validator
                ->integer('categoria')
                ->allowEmptyString('categoria');

            $validator
                ->integer('serie')
                ->allowEmptyString('serie');

            $validator
                ->integer('edicao')
                ->allowEmptyString('edicao');

            $validator
                ->integer('tipo')
                ->allowEmptyString('tipo');

            $validator
                ->scalar('capa')
                ->maxLength('capa', 10)
                ->allowEmptyString('capa');
    */
        return $validator;
    }

    // Mostra novos livros (default.ctp)
    public function livroNovo()
    {
        $livroDB = TableRegistry::getTableLocator()->get('Livros');

        return $livroDB->find('all', [
            'order' => ['Livros.id' => 'DESC'],
            'limit' => 30
        ]);
    }

    // Mostra quantos livros (default.ctp)
    public function livroCount()
    {
        $livroDB = TableRegistry::getTableLocator()->get('Livros');

        return $livroDB->find('all')->count();
    }

    // Mostra quantos páginas (default.ctp)
    public function pageCount()
    {
        $livroDB = TableRegistry::getTableLocator()->get('Livros');
        $livro = $livroDB->find('all');
        $livrot = $livro->select(['sum' => $livro->func()->sum('n_pag')])->first();

        // Substitui 1000 por K
        $n = strlen($livrot->sum);
        if ($n > 9) {
            $livrot->sum = substr($livrot->sum,0, $n-9) .'KKK';
        }
        elseif (($n > 6) AND ($n < 10)) {
            $livrot->sum = substr($livrot->sum,0, $n-6) .'KK';
        }
        elseif (($n > 3) AND ($n < 7)) {
            $livrot->sum = substr($livrot->sum,0, $n-3) .'K';
        }

        return $livrot->sum;
    }

    // Add Pesquisa
    public function addPesquisa($busca = null, $iduser = null)
    {
        $articlesTable = TableRegistry::get('Pesquisas');
        $article = $articlesTable->newEntity();
        $article->termo = $busca;
        $article->datainfo = date('Y-m-d H:s');
        if ($iduser) {
            $article->id_user = $iduser;
        }

        $articlesTable->save($article);
    }
}
