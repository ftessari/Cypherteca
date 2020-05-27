<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
//use Cake\Form\Form;
//use Cake\Form\Schema;

/**
 * Livros Controller
 *
 * @property \App\Model\Table\LivrosTable $Livros
 *
 * @method \App\Model\Entity\Livro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index'); // Liberado index. Não precisa estar logado
        $this->Auth->allow('view'); // Liberado view. Não precisa estar logado
    }

    public function index()
    {
        //$livros = $this->paginate($this->Livros);

        // Controle de tabela index
        if (!empty($_GET['busca'])) {
            $busca = $_GET['busca'];
			
			// Inclusão de termos de busca - INCIO
			if (!empty($this->request->getSession()->read('Auth.User.id'))) {
				$iduser = $this->request->getSession()->read('Auth.User.id');
			}
			else {
				$iduser = null;
			}
			
			// Pesquisa termo
			$articlesPesq = TableRegistry::getTableLocator()->get('Pesquisas');
			$qPesquisa = $articlesPesq->find('all', 
				[
					'order' => ['id' => 'DESC']
				]
			)->first();
			
			if (!empty($qPesquisa)) :
			if ($qPesquisa->termo != $busca) {			
				// Função para adicionar pesquisa à lista
				$this->Livros->addPesquisa($busca, $iduser);
			}
			endif;
			// Inclusão de temos de busca - FIM

            $query = $this->Livros->find('all', 
				['contain' => ['Livrocat', 'Livroidioma', // 'Livrolinks',
                'Livroautor', 'Livroeditoras', 'Livrotipos', 'Livroserie']
				])->where([
                'OR' =>
                    [
                        'Livros.titulo LIKE' => '%'.$busca.'%',
                        'Livros.tags LIKE' => '%'.$busca.'%',
                        'Livros.subtitulo LIKE' => '%'.$busca.'%',
                        'Livroautor.autor LIKE' => '%'.$busca.'%',
                        'Livroserie.serie LIKE' => '%'.$busca.'%',
                        'Livrocat.categoria LIKE' => '%'.$busca.'%'
					//  'Livroeditoras.editora LIKE' => '%'.$busca.'%',
                    //  'Livrotipos.tipo LIKE' => '%'.$busca.'%',
					//  'Livroidioma.idioma LIKE' => '%'.$busca.'%',
                    ]
				]
			)->Order(['Livros.titulo' => 'ASC']);
        }
		elseif (!empty($_GET['iduser'])) {
            $iduser = $_GET['iduser'];

            $query = $this->Livros->find('all', 
				[
					'contain' => ['Livrocat',  'Livrolinks',
								'Livroautor', 'Livroserie']
				])->where([               
						'Livrolinks.iduser' => $iduser                    
				])->Order(['Livros.titulo' => 'ASC']);
        }
        else {
            $query = $this->Livros->find('all', ['contain' =>
                [
                    'Livrocat', 'Livroautor', 'Livroeditoras',
                    'Livrotipos', 'Livroserie', 'Livroidioma'
				]
			])->Order(['Livros.titulo' => 'ASC']);
        }
        // Controle de tabela index	- fim

        // Categorias - barra lateral
        $articles = TableRegistry::getTableLocator()->get('Livrocat');
        $qcategoria = $articles->find()->orderAsc('categoria');
        // Categorias - fim

        $livros = $this->paginate($query);
      //  $count = $query->count();

        $this->set(compact('livros', 'qcategoria'));//, 'count'));
    }

    /**
     * View method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dbLinks = new LivrolinksController();
	    $dbComentarios = new LivrocomentariosController();
	   	$dbPontos = new LivropontosController();
		
        $livro = $this->Livros->get($id, [
            'contain' => ['Livrocat', 'Livroidioma', 'Livroautor', 'Livroeditoras',
                'Livrotipos', 'Livroserie'] //  Tabelas para vincular ao View
        ]);

        $comentarios = $dbComentarios->Livrocomentarios->find('all',
            ['contain' => ['Usuarios']])
            ->where([
				'Livrocomentarios.id_livro' => $id
			]);
		
		$downloads = $dbLinks->Livrolinks->find('all',
            ['contain' => ['Usuarios', 'Livroformatos']
			])->where([
				'Livrolinks.idlivro' => $id
			]);
		
		$pontos = $dbPontos->Livropontos->find('all',
            ['contain' => ['Usuarios', 'Livros']
			])->where([
				'Livropontos.idlivro' => $id
			]);
		$countPontos = $pontos->count();
		
		// Categorias - barra lateral
        $articles = TableRegistry::getTableLocator()->get('Livrocat');
        $qcategoria = $articles->find()->orderAsc('categoria');
        // Categorias - fim
		
        $this->set(compact('livro', 'comentarios', 'downloads', 'qcategoria',
            'pontos', 'countPontos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Score
        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array
        $idUser = $this->request->getSession()->read('Auth.User.id');
        $score = 0;

        $livro = $this->Livros->newEntity(['contain' => ['Usuarios']]);

        if ($this->request->is('post')) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());

            if ($livro->titulo) {
                $score += $pontos->nova_obra;
            }
            if ($livro->subtitulo) {
                $score += $pontos->stitulo;
            }
            if ($livro->sinopse){
                $score += $pontos->sinopse;
            }
            if ($livro->ano){
                $score += $pontos->datapub;
            }
            if ($livro->ididioma){
                $score += $pontos->datapub;
            }
            if ($livro->n_pag){
                $score += $pontos->n_paginas;
            }
            if ($livro->ideditora > 0){
                $score += $pontos->editora;
            }
            if ($livro->ISBN){
                $score += $pontos->isbn;
            }
            if ($livro->idautor > 0){
                $score += $pontos->autor;
            }
            if ($livro->link_comp){
                $score += $pontos->link_comp;
            }
            if ($livro->idcategoria){
                $score += $pontos->categoria;
            }
            if ($livro->idserie > 0){
                $score += $pontos->serie;
            }
            if ($livro->edicao){
                $score += $pontos->edicao;
            }
            if ($livro->idtipo){
                $score += $pontos->tipo;
            }
            if ($livro->tags) {
                $livro->tags = str_replace(',', '#', $livro->tags);
                $livro->tags = str_replace(';', '#', $livro->tags);
                $livro->tags = str_replace('-', '#', $livro->tags);
                $livro->tags = str_replace(':', '#', $livro->tags);
                $score += $pontos->tags;
            }

            if ($this->Livros->save($livro)) {
                $this->score($idUser, $score); // Score

                if (!empty($livro->link)) { // Upload de link
                    $this->linkPrimo($livro->titulo, $livro->link, $livro->descricao, $livro->partes); // Primeiro Link
                }

                $this->Flash->success(__('Dados de livro incluído com sucesso!'));
				
				return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }

        // Ligações com outras tabelas/ modulos
        $parentCategorias = $this->Livros->Livrocat->find('list')->orderAsc('categoria');
        $this->set(compact('livro', 'parentCategorias'));
		
		$parentSeries = $this->Livros->Livroserie->find('list')->orderAsc('serie');
        $this->set(compact('livro', 'parentSeries'));
		
        $parentTipos = $this->Livros->Livrotipos->find('list')->orderAsc('id');
        $this->set(compact('livro', 'parentTipos'));

        $parentAutores = $this->Livros->Livroautor->find('list')->orderAsc('autor');
        $this->set(compact('livro', 'parentAutores'));

        $parentIdiomas = $this->Livros->Livroidioma->find('list')->orderAsc('id');
        $this->set(compact('livro', 'parentIdiomas'));

        $parentEditoras = $this->Livros->Livroeditoras->find('list')->orderAsc('editora');
        $this->set(compact('livro', 'parentEditoras'));

		// Categorias - barra lateral
        $articles = TableRegistry::getTableLocator()->get('Livrocat');
        $qcategoria = $articles->find()->orderAsc('categoria');
        // Categorias - fim

        $this->set(compact('livro', 'qcategoria'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livro = $this->Livros->get($id, [
            'contain' => []
        ]);

        // Score
        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array
        $idUser = $this->request->getSession()->read('Auth.User.id');
        $score = 0;	
		
        // Desativação de edição
		if (($livro->editavel == 0) AND ($this->request->Session()->read('Auth.User.tipo') < 2)) { 
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());
           
			$total = count($_FILES['upload']['tmp_name']);
			
			// Loop through each file
			for( $i=0 ; $i < $total ; $i++ ) {
	
				//Get the temp file path
				$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
		
				$this->set('file', $tmpFilePath);
				$ext = @end(explode('.', $_FILES['upload']['name'][$i]));	// pega extensão
				$foto = $livro->id .'.'. $ext; 	// novo nome -> db e patch		

				if ($ext) {	// Edit com IMG		
					// Upload
					$target_dir = WWW_ROOT . 'img' . DS . 'capas' . DS;
					$target_file = $target_dir . basename($foto);        // old- basename($_FILES["upload"]["name"]);
			
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			
					// Check se arquivo já existe
					if (file_exists($target_file)) {				
						echo unlink($target_file);
					}
			
					// Check tamanho do arquivo
					if ($_FILES["upload"]["size"][$i] > 5000000) {
						$this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i]));
						return $this->redirect(['action' => 'edit', $livro->id]);							
					}
			
					// Libera formato do arquivo
					if ($imageFileType != "jpg" && $imageFileType != "png" && 
						$imageFileType != "jpeg" && $imageFileType != "gif" && 
						$imageFileType != "png" && $imageFileType != "jfif") {
						$this->Flash->error("Desculpe, apenas JPG, JPEG, GIF, PNG e JFiF são permitidos.");
						return $this->redirect(['action' => 'edit', $livro->id]);
					}
			
					if (move_uploaded_file($tmpFilePath, $target_file)) {
						//echo "O arquivo " . basename($foto) . " foi concluido.";
			
						$articlesTable = TableRegistry::get('Livros');
						// $article = $articlesTable->newEntity();
			
						$article = $articlesTable->get($id);
						
						if (!empty($foto)) {
							$article->capa = $foto;
							$score += $pontos->capa;
						}
						//$article->dataultimo = date('Y-m-d H:s');
						if ($livro->titulo) {
							$article->titulo = $livro->titulo;
						// $score += $pontos->nova_obra; // incluido no add
						}
						if ($livro->subtitulo) {
							$article->subtitulo = $livro->subtitulo;
							$score += $pontos->stitulo;
						}
						if ($livro->sinopse){
							$article->sinopse = $livro->sinopse;
							$score += $pontos->sinopse;
						}
						if ($livro->ano){
							$article->ano = $livro->ano;
							$score += $pontos->datapub;
						}
						if ($livro->ididioma){
							$article->ididioma = $livro->ididioma;
							$score += $pontos->datapub;
						}
						if ($livro->n_pag){
							$article->n_pag = $livro->n_pag;
							$score += $pontos->n_paginas;
						}
						if ($livro->ideditora > 0){
							$article->ideditora = $livro->ideditora;
							$score += $pontos->editora;
						}
						if ($livro->ISBN){
							$article->ISBN = $livro->ISBN;
							$score += $pontos->isbn;
						}
						if ($livro->idautor > 0){
							$article->idautor = $livro->idautor;
							$score += $pontos->autor;
						}
						if ($livro->link_comp){
							$article->link_comp = $livro->link_comp;
							$score += $pontos->link_comp;
						}
						if ($livro->idcategoria){
							$article->idcategoria = $livro->idcategoria;
							$score += $pontos->categoria;
						}
						if ($livro->idserie > 0){
							$article->idserie = $livro->idserie;
							$score += $pontos->serie;
						}
						if ($livro->edicao){
							$article->edicao = $livro->edicao;
							$score += $pontos->edicao;
						}
						if ($livro->idtipo){
							$article->idtipo = $livro->idtipo;
							$score += $pontos->tipo;
						}
                        if ($livro->tags) {
                            $livro->tags = str_replace(',', '#', $livro->tags);
                            $livro->tags = str_replace(';', '#', $livro->tags);
                            $livro->tags = str_replace('-', '#', $livro->tags);
                            $article->tags = str_replace(':', '#', $livro->tags);
                            $score += $pontos->tags;
                        }
						$dbLivro = new LivrosController();
						$qLivro = $dbLivro->Livros->find('all')->where(['id' => $id])->first();

						// Verifica se já pode fechar o modo de edição
						if (
							(!empty($qLivro->subtitulo) || !empty($article->subtitulo)) AND
							(!empty($qLivro->capa) || !empty($article->capa)) AND
							(!empty($qLivro->edicao) || !empty($article->edicao)) AND
							(!empty($qLivro->idautor) || !empty($article->idautor)) AND
							(!empty($qLivro->ISBN) || !empty($article->ISBN)) AND
							(!empty($qLivro->n_pag) || !empty($article->n_pag)) AND
							(!empty($qLivro->ano) || !empty($article->ano)) AND
							(!empty($qLivro->sinopse) || !empty($article->sinopse))
						) {
							$article->editavel = 0; // Desabilita edição
						}

						if ($articlesTable->save($article)) {
							$this->score($idUser, $score); // Pontuação
							$this->Flash->success(__('Dados da obra editados com sucesso!'));

						}

						// Check se é uma imagem
						if (isset($_FILES["upload"]["name"][$i])) {
							$check = getimagesize($target_dir . $foto);

							if ($check == false) {
								$this->Flash->error(__('Este arquivo não é uma imagem.'));
								return $this->redirect(['action' => 'edit', $livro->id]);
							}
						}
						else {
							$this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
                            return $this->redirect(['action' => 'edit', $livro->id]);
						}

                        return $this->redirect(['action' => 'view', $livro->id]);
					}
					// $usuarios = $this->Titulos->Usuarios->find('list', ['limit' => 200]);
					// $this->set(compact('usuario', 'usuarios'));
			
					// return $this->redirect(['action' => 'index']);
				}			
				else {
					// Editar sem IMG
					// :: Pontuação
					if ($livro->subtitulo) {
						$score += $pontos->stitulo;
					}
					if ($livro->sinopse){
						$score += $pontos->sinopse;
					}
					if ($livro->ano){
						$score += $pontos->datapub;
					}
					if ($livro->ididioma){
						$score += $pontos->datapub;
					}
					if ($livro->n_pag){
						$score += $pontos->n_paginas;
					}
					if ($livro->ideditora > 0){
						$score += $pontos->editora;
					}
					if ($livro->ISBN){
						$score += $pontos->isbn;
					}
					if ($livro->idautor > 0){
						$score += $pontos->autor;
					}
					if ($livro->link_comp){
						$score += $pontos->link_comp;
					}
					if ($livro->idcategoria){
						$score += $pontos->categoria;
					}
					if ($livro->idserie > 0){
						$score += $pontos->serie;
					}
					if ($livro->edicao){
						$score += $pontos->edicao;
					}
					if ($livro->idtipo){
						$score += $pontos->tipo;
					}
                    if ($livro->tags) {
                        $livro->tags = str_replace(',', '#', $livro->tags);
                        $livro->tags = str_replace(';', '#', $livro->tags);
                        $livro->tags = str_replace('-', '#', $livro->tags);
                        $livro->tags = str_replace(':', '#', $livro->tags);
                        $score += $pontos->tags;
                    }
					
					$dbLivro = new LivrosController();
					$qLivro = $dbLivro->Livros->find('all')->where(['id' => $id])->first();

                    // Verifica se já pode fechar o modo de edição
					if (
						(!empty($qLivro->subtitulo) || !empty($livro->subtitulo)) AND
						(!empty($qLivro->capa) || !empty($livro->capa)) AND
						(!empty($qLivro->edicao) || !empty($livro->edicao)) AND
						(!empty($qLivro->idautor) || !empty($livro->idautor)) AND
						(!empty($qLivro->ISBN) || !empty($livro->ISBN)) AND
						(!empty($qLivro->n_pag) || !empty($livro->n_pag)) AND
						(!empty($qLivro->ano) || !empty($livro->ano)) AND
						(!empty($qLivro->sinopse) || !empty($livro->sinopse))
						) 
					{
						$livro->editavel = 0; // Desabilita edição
					}
				
					// Salva
					if ($this->Livros->save($livro)) {
					    $this->score($idUser, $score); // Pontuação
						$this->Flash->success(__('Dados da obra editados com sucesso!'));
                        return $this->redirect(['action' => 'view', $livro->id]);
					}
				}
			$this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
           
			}			 
        }
    

        // Ligações com outras tabelas/ modulos
        $parentCategorias = $this->Livros->Livrocat->find('list')->orderAsc('categoria');
        $this->set(compact('livro', 'parentCategorias'));
		
		$parentSeries = $this->Livros->Livroserie->find('list')->orderAsc('serie');
        $this->set(compact('livro', 'parentSeries'));

        $parentTipos = $this->Livros->Livrotipos->find('list')->orderAsc('id');
        $this->set(compact('livro', 'parentTipos'));

        $parentAutores = $this->Livros->Livroautor->find('list')->orderAsc('autor');
        $this->set(compact('livro', 'parentAutores'));

        $parentIdiomas = $this->Livros->Livroidioma->find('list')->orderAsc('id');
        $this->set(compact('livro', 'parentIdiomas'));

        $parentEditoras = $this->Livros->Livroeditoras->find('list')->orderAsc('editora');
        $this->set(compact('livro', 'parentEditoras'));

        // Categorias - barra lateral
        $articles = TableRegistry::getTableLocator()->get('Livrocat');
        $qcategoria = $articles->find()->orderAsc('categoria');
        // Categorias - fim
		
        $this->set(compact('livro', 'qcategoria'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livro = $this->Livros->get($id);

        // Check se capa existe e deleta
        $target_dir = WWW_ROOT . 'img' . DS . 'capas' . DS;
        $target_file = $target_dir . basename($livro->capa);
        if (file_exists($target_file)) {
            echo unlink($target_file);
        }

        if ($this->Livros->delete($livro)) {
            $this->Flash->success(__('Obra removida.'));
        } else {
            $this->Flash->error(__('A obra não pode ser removida. Entre em contato com a Administração.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livro = $this->Livros->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK

        if ($this->request->is(['patch', 'post', 'put'])) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());			

			$livro->editavel = $value;
			if ($this->Livros->save($livro)) {
				$this->Flash->success(__('Registro salvo.'));
                //  $this->livro->Logs->log_rec($livro->id, date('Y-m-d H:s'),'Autor', 'Manutenção', 10, '');
                //$mdlog-> log_rec( //para tabelas sem vinculo
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
	
	// Score
	public function score($id = null, $value = 0)
    {
		$articlesTable = TableRegistry::get('Usuarios');
        $article = $articlesTable->get($id);

        $article->pontos += $value;				

        if ($articlesTable->save($article)) {
			//$this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Pontos', $value, '');
			return $this->redirect(['action' => 'index']);
		}
    }
	
	// Remover Capa
	public function delImg($id = null)
    {
		$livro = $this->Livros->get($id, [
            'contain' => []
        ]);
		//$mdlog = new LogsTable(); //para tabelas sem

        if ($this->request->is(['patch', 'post', 'put'])) {
            $livro = $this->Livros->patchEntity($livro, $this->request->getData());			
			
			// Check se arquivo existe e deleta            
			$target_dir = WWW_ROOT . 'img' . DS . 'capas' . DS;
            $target_file = $target_dir . basename($livro->capa);  				
			if (file_exists($target_file)) {
				echo unlink($target_file);
            }
			
			$livro->capa = '';
			if ($this->Livros->save($livro)) {
				$this->Flash->success(__('Capa deletada.'));
               // $this->Livros->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Remoção de avatar', 0, '');
               // $mdlog->log_rec( // para tabelas sem vinculo
				return $this->redirect(['action' => 'view', $id]);
			} 
		}
    }

    // Add primeiro link de livro ao cadastrar obra
    public function linkPrimo($titulo = '', $link = '', $descricao = '', $partes = 0)
    {
        $query = $this->Livros->find('all')
            ->where(['Livros.titulo' => $titulo])
            ->order(['Livros.id' => 'DESC']);

        $livro = $this->paginate($query)->first();

        $articlesTable = TableRegistry::get('Livrolinks');
        $article = $articlesTable->newEntity();

        $article->idlivro = $livro->id;
        $article->link = $link;
        $article->idformato = 1; // por padrão, depois muda
        $article->descricao = $descricao;
        $article->partes = $partes;
        $article->ativo  = 1;
        $article->iduser = $this->request->getSession()->read('Auth.User.id');
        $article->dataenvio = date('Y-m-d H:s');

        $articlesTable->save($article);
    }
}
