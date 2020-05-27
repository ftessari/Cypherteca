<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Usuarios Controller
 *
 * @proper' ty \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);		
		 // Liberado. Não precisa estar logado
		 $this->Auth->allow('add');
		 $this->Auth->allow('view');
		 $this->Auth->allow('rank'); 
	}
	
	/**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
     	// Redirecionar Usuário
		if ((empty($this->request->getSession()->read('Auth.User.id'))) ||
            ($this->request->getSession()->read('Auth.User.tipo') < 2)) :
			return $this->redirect('/');	
		endif; 

		if (!empty($_GET['busca'])) {
			$busca = $_GET['busca'];		
		
			$query = $this->Usuarios->find('all', [
				'contain' => ['Utipos']]
				)->where([					
				'OR' => 
					[
						'nome LIKE' => $busca.'%', 
						'login LIKE' => $busca.'%'
					]
				]
			);
		}
		else {		
			$query = $this->Usuarios->find('all', [
            'contain' => ['Utipos'] // Addiciona tabela para pegar campo
        ]);
		}
		
		//$usuarios = $this->paginate($this->Usuarios);
		$usuarios = $this->paginate($query);
		
        $this->set(compact('usuarios'));	
    }
	
	public function rank($tipo = null)
    { 	
		if (!empty($_GET['busca'])) {
			$busca = $_GET['busca'];

			if ($tipo == 'heart') { // Rank Heart
				$query = $this->Usuarios->find('all', [
				'contain' => ['Utipos']])->where([
				'OR' =>
					[
						'Usuarios.nome LIKE' => $busca.'%',
						'Usuarios.login LIKE' => $busca.'%'
					],
				'order' => ['Usuarios.heart' => 'DESC']
				]);
			} elseif ($tipo == 'pontos') {
				$query = $this->Usuarios->find('all', [
				'contain' => ['Utipos']])->where([
				'OR' =>
					[
						'Usuarios.nome LIKE' => $busca.'%',
						'Usuarios.login LIKE' => $busca.'%'
					],
				'order' => ['Usuarios.pontos' => 'DESC']
				]);
			}
			else {
                return $this->redirect('/');
            }
		}
		else {
			if ($tipo == 'heart') {
				$query = $this->Usuarios->find('all', [
				'contain' => ['Utipos'], // Addiciona tabela para pegar campo
				'order' => ['Usuarios.heart' => 'DESC']
				]);
			} elseif ($tipo == 'pontos') {
				$query = $this->Usuarios->find('all', [
				'contain' => ['Utipos'], // Addiciona tabela para pegar campo
				'order' => ['Usuarios.pontos' => 'DESC']
				]);
			}
			else {
                return $this->redirect('/');
            }
		}

		//$usuarios = $this->paginate($this->Usuarios);
		$usuarios = $this->paginate($query);
		
        $this->set(compact('usuarios', 'tipo'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       // $dbtipos = new UtiposController();

        // Pegar status
        $dbstatus = new StatusController();
       /* $dbustatus = new UstatusController();

        $ustatus = $dbustatus->Ustatus->find('all')->where(['id_user' => $id])->last();
		if (!$ustatus) {
			$id_status = 6; // Padrão
		} else {
			$id_status = $ustatus->id_status;
		} 
		
        $status = $dbstatus->Status->find('all')->where(['Status.id' => $id_status])->first();*/
		// Fim do status

        // Pegar rank
        $dburank = new UrankController();
      
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Utipos', 'Titulos']
        ]);
		
		$status = $dbstatus->Status->find('all')->where(['id' => $usuario->idstatus])->first();
        $urank = $dburank->Urank->find('all')->where(['pontos <=' => $usuario->pontos])->last();

        /*$tipos = $dbtipos->Utipos->find('all',
            ['contain' => []])
            ->where(['id' => $id]); */

      //  $this->set(compact('usuario', 'tipos'));
        $this->set(compact('usuario', 'status', 'urank'));
 
       // $this->set('usuario', $usuario);
		
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            $userlogin = $usuario->login; // Atribuir na busca para envio de msg boas vindas

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Bem-vindo! Faça Login. :)'));

                // Criar Pasta
              /*  $reg = $this->Usuarios->findByTitle($usuario->login)->toArray();
                debug($reg);
                $caminho = WWW_ROOT.DS.'img'.DS.'users'.DS.$reg[0]['id'];
                $dir = new Folder();
                if ($dir->create($caminho, true, 0755)) {
                    $this->Flash->sucess('Diretório criado.');
                }*/

                // Enviar mensagem de boas vindas
                $query = $this->Usuarios->find('all')->where([
                    'login' => $userlogin
                ])->first();

                $painelMai = new \App\Model\Table\UmailTable();
                $painelMai->bemvindo($query->id);
                // Fim da mensagem


                if ($this->request->getSession()->read('Auth.User.id')) {
                    return $this->redirect(['action' => 'index']);
                }
                else {
                    return $this->redirect('/');
                }

            }
            $this->Flash->error(__('Não foi possível incluir o registro. Tente novamente ou entre em contato com um administrador.'));
        }
       // $pontos = $this->Usuarios->Pontos->find('list', ['limit' => 200]);
      //  $status = $this->Usuarios->Status->find('list', ['limit' => 200]);
      //  $titulos = $this->Usuarios->Titulos->find('list', ['limit' => 200]);
      //  $tipos = $this->Usuarios->UsuariosTipo->find('list', ['limit' => 200]);
		$this->set(compact('usuario'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		// Redirecionar Usuário
		if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
			if ($this->request->getSession()->read('Auth.User.id') <> $id) {
				return $this->redirect('/');
			}
		endif;

        // Score
        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array
        $idUser = $this->request->getSession()->read('Auth.User.id');
        $score = 0;

		$usuario = $this->Usuarios->get($id);
      /*  $usuario = $this->Usuarios->get($id, [
            'contain' => ['Pontos', 'Status', 'Titulos']
        ]); */

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

			if (!empty($_FILES['upload']['tmp_name'])) {
				$total = count($_FILES['upload']['tmp_name']);
			}
			else {
				$total = 1;
			}
			
			// Loop through each file
			for( $i=0 ; $i < $total ; $i++ ) {

				if (!empty($_FILES['upload']['tmp_name'])) {
					//Get the temp file path
					$tmpFilePath = $_FILES['upload']['tmp_name'][$i];
	
					$this->set('file', $tmpFilePath);
					$ext = @end(explode('.', $_FILES['upload']['name'][$i])); // pega extensão
					$foto = $usuario->id .'.'. $ext; 	// novo nome -> db e patch
				}
				else {
					$ext = null;
				}
				
				if ($ext) {
					// Upload
					$target_dir = WWW_ROOT . 'img' . DS . 'users' . DS;
					$target_file = $target_dir . basename($foto);        // old- basename($_FILES["upload"]["name"]);
	
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	
					// Check se arquivo já existe
					if (file_exists($target_file)) {				
						echo unlink($target_file);
					}
	
					// Check tamanho do arquivo
					if ($_FILES["upload"]["size"][$i] > 5000000) {
						$this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i]));
						return $this->redirect(['action' => 'edit', $id]);
						// echo "Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i];
						//exit();
					}
	
					// Libera formato do arquivo
					if ($imageFileType != "jpg" && $imageFileType != "png" && 
						$imageFileType != "jpeg" && $imageFileType != "gif" && 
						$imageFileType != "png" && $imageFileType != "jfif") {
						$this->Flash->error("Desculpe, apenas JPG, JPEG, GIF, PNG e JFiF são permitidos.");
						return $this->redirect(['action' => 'edit', $id]);
					}
	
					if (move_uploaded_file($tmpFilePath, $target_file)) {
                        $this->Flash->success(__("O arquivo " . basename($foto) . " foi concluido."));
	
						$articlesTable = TableRegistry::get('Usuarios');
					// $article = $articlesTable->newEntity();
	
						$article = $articlesTable->get($id);
	
						$article->avatar = $foto;
						$article->dataultimo = date('Y-m-d H:s');
						if ($usuario->nome)
							$article->nome = $usuario->nome;
						if ($usuario->datanasci)
							$article->datanasci = $usuario->datanasci;
						if ($usuario->bio)
							$article->bio = $usuario->bio;
						if ($usuario->email)
							$article->email = $usuario->email;
						if ($usuario->site)
							$article->site = $usuario->site;
                        if ($usuario->telegram) {
                            $usuario->telegram = str_replace('http://', '', $usuario->telegram);
                            $usuario->telegram = str_replace('https://', '', $usuario->telegram);
                            $usuario->telegram = str_replace('www', '', $usuario->telegram);
                            $article->telegram = str_replace('t.me/', '', $usuario->telegram);
                        }
						if ($articlesTable->save($article)) {
                            if ($usuario->bio) {
                                $this->score($idUser, $pontos->user_bio); // Score
                            }

                            $this->Flash->success(__('Registro salvo.'));
						}
	
						// Check se é uma imagem
						if (isset($_FILES["upload"]["name"][$i])) {
							$check = getimagesize($target_dir . $foto);
	
							if ($check == false) {
								$this->Flash->error(__('Este arquivo não é uma imagem.'));
								return $this->redirect(['action' => 'edit', $id]);
							}
	
							return $this->redirect(['action' => 'index']);
						}
						else {
							$this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
						}
					}
					// $usuarios = $this->Titulos->Usuarios->find('list', ['limit' => 200]);
					// $this->set(compact('usuario', 'usuarios'));
	
					// return $this->redirect(['action' => 'index']);
				} 
				else {
                    if ($usuario->telegram) {
                        $usuario->telegram = str_replace('http://', '', $usuario->telegram);
                        $usuario->telegram = str_replace('https://', '', $usuario->telegram);
                        $usuario->telegram = str_replace('www', '', $usuario->telegram);
                        $usuario->telegram = str_replace('t.me/', '', $usuario->telegram);
                    }

					if ($this->Usuarios->save($usuario)) {
                        if ($usuario->bio) {
                            $this->score($idUser, $pontos->user_bio); // Score
                        }
						$this->Flash->success(__('Usuário editado com sucesso!'));
			
						return $this->redirect(['action' => 'view', $id]);
					}
				}
				$this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
			}

			// Edit de senha e Admin board
            if ($usuario->telegram) {
                $usuario->telegram = str_replace('http://', '', $usuario->telegram);
                $usuario->telegram = str_replace('https://', '', $usuario->telegram);
                $usuario->telegram = str_replace('www', '', $usuario->telegram);
                $usuario->telegram = str_replace('t.me/', '', $usuario->telegram);
            }

            if ($this->Usuarios->save($usuario)) {
                if ($usuario->bio) {
                    $this->score($idUser, $pontos->user_bio); // Score
                }
                $this->Flash->success(__('Usuário editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            

            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
          
            // $this->set(compact('usuario', 'pontos', 'status', 'titulos'));
        }

        // Ligações com outras tabelas/ modulos
        $parentTipos = $this->Usuarios->Utipos->find('list')->orderAsc('tipouser');
        $this->set(compact('usuario', 'parentTipos'));
		
		$parentStatus = $this->Usuarios->Status->find('list')->orderAsc('id');
        $this->set(compact('usuario', 'parentStatus'));

	   // $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) : // Somente Dev
            return $this->redirect('/');
        endif;

        /*
         * Bug no deletar tem relação com a tabel Logs e seus dados.
         * Mesmo estando desvinculado no sistema de chave estrangeira
         * e atribuido como NO ACTION
         */

        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Usuário deletado.'));

            $img = WWW_ROOT . 'img' . DS . 'users' . DS;
            if (trim($usuario->avatar) != '') {
                unlink($img . $usuario->avatar); // Deleta arquivo
            }
        } else {
            $this->Flash->error(__('Usuário não pode ser deletado. Entre em contato com o Dev..'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function login() 
	{
		if ($this->request->getSession()->read('Auth.User.id')) {
			return $this->redirect('/');
		}
			
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				
				// Teste de usuário ativo
				if ($this->request->getSession()->read('Auth.User.idstatus') > 3 ) { // 4 = bloqueado; 5 = banido;
					$this->Flash->error(__('Usuário desativado. Por favor, entre em contado com a Administração.'));			
					$this->redirect(['controller' => 'Usuarios', 'action' => 'logout']);	
				}
				return $this->redirect($this->Auth->redirectUrl());				
			}
			$this->Flash->error(__('Usuário ou senha inválido. Por favor, tente novamente.'));				
		}	
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	// Ativação
	public function ativa($id = null, $value = 0)
    {
		$usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo com usuarios
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());			
			
			$usuario->idstatus = $value;
			if ($this->Usuarios->save($usuario)) {
				$this->Flash->success(__('Registro salvo.'));
                $this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Manutenção de usuário', 10, 'texto extra');
                //$mdlog->log_rec( //para tabelas sem vinculo com usuarios
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
	
	// Remover Avatar
	public function delImg($id = null)
    {
		$usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo com usuarios
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());			
			
			// Check se arquivo existe e deleta            
			$target_dir = WWW_ROOT . 'img' . DS . 'users' . DS;
            $target_file = $target_dir . basename($usuario->avatar);  				
			if (file_exists($target_file)) {
				echo unlink($target_file);
            }
			
			$usuario->avatar = '';
			if ($this->Usuarios->save($usuario)) {
				$this->Flash->success(__('Avatar deletado.'));
               // $this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Remoção de avatar', 0, '');
                //$mdlog->log_rec( //para tabelas sem vinculo com usuarios
				return $this->redirect(['action' => 'view', $id]);
			} 
		}
    }

    // Heart - add
    public function addHeart($iduser = null)
    {
        $usuario = $this->Usuarios->get($iduser, [
            'contain' => []
        ]);

        //$mdlog = new LogsTable(); //para tabelas sem vinculo com usuarios

        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            $usuario->heart += 1;
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Agradecimento recebido. Vlw! : )'));
               // $this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Manutenção de usuário', 10, 'texto extra');
                //$mdlog->log_rec( //para tabelas sem vinculo com usuarios
                return $this->redirect(['action' => 'view', $iduser]);
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
}
