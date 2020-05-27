<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;


/**
 * Livroautor Controller
 *
 * @property \App\Model\Table\LivroautorTable $Livroautor
 *
 * @method \App\Model\Entity\Livroautor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroautorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$query = $this->Livroautor->find('all')->where([
                'AND' => ['Livroautor.autor <>' => ''] // Remover o primeiro registro padrão da lista
            ])->Order(['Livroautor.autor' => 'ASC']);
		
		$livroautor = $this->paginate($query);

        $this->set(compact('livroautor'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroautor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($id < 1) { // Autor Null
            return $this->redirect(['action' => 'index']);
        }

        $dblivros = new LivrosController();

        $livroautor = $this->Livroautor->get($id, [
            'contain' => []
        ]);

        $qlivros = $dblivros->Livros->find('all', [
            'contain' => []
            ])->where(['Livros.idautor' => $id]
        );


        $this->set(compact('livroautor', $livroautor, 'qlivros'));
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

        $livroautor = $this->Livroautor->newEntity();
        if ($this->request->is('post')) {
            $livroautor = $this->Livroautor->patchEntity($livroautor, $this->request->getData());
            if ($this->Livroautor->save($livroautor)) {
                $this->score($this->request->getSession()->read('Auth.User.id'), $pontos->novo_autor); // Pontuação
                $this->Flash->success(__('Informação incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroautor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroautor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Score
        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array
        $idUser = $this->request->getSession()->read('Auth.User.id');
        $score = 0;

        $livroautor = $this->Livroautor->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livroautor->editavel == 0) AND ($this->request->getSession()->read('Auth.User.tipo') < 2)) {
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroautor = $this->Livroautor->patchEntity($livroautor, $this->request->getData());
            $total = count($_FILES['upload']['tmp_name']);

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                $this->set('file', $tmpFilePath);
                $ext = @end(explode('.', $_FILES['upload']['name'][$i])); 						// pega extensão
                $foto = $livroautor->id .'.'. $ext; 	// novo nome -> db e patch

                if ($ext) {
                    // Upload
                    $target_dir = WWW_ROOT . 'img' . DS . 'autores' . DS;
                    $target_file = $target_dir . basename($foto);        // old- basename($_FILES["upload"]["name"]);

                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check se arquivo já existe
                    if (file_exists($target_file)) {				
						echo unlink($target_file);
					}

                    // Check tamanho do arquivo
                    if ($_FILES["upload"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i]));
                        return $this->redirect(['action' => 'edit', $livroautor->id]);
                        // echo "Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i];
                        //exit();
                    }

                    // Libera formato do arquivo
                    if ($imageFileType != "jpg" && $imageFileType != "png" && 
						$imageFileType != "jpeg" && $imageFileType != "gif" && 
						$imageFileType != "png" && $imageFileType != "jfif") {
						$this->Flash->error("Desculpe, apenas JPG, JPEG, GIF, PNG e JFiF são permitidos.");
						return $this->redirect(['action' => 'edit', $livroautor->id]);
                    }

                    if (move_uploaded_file($tmpFilePath, $target_file)) {
                        echo "O arquivo " . basename($foto) . " foi concluido.";

                        $articlesTable = TableRegistry::get('Livroautor');
                        // $article = $articlesTable->newEntity();

                        $article = $articlesTable->get($id);

                        if ($article->foto <> $foto) {
                            $article->foto = $foto;
                            $score += $pontos->autor_foto;
                        }

                        if ($livroautor->autor)
                            $article->autor = $livroautor->autor;
                        if ($livroautor->datanasci)
                            $article->datanasci = $livroautor->datanasci;
                        if ($livroautor->bio) {
                            $article->bio = $livroautor->bio;
                            $score += $pontos->autor_bio;
                        }
                        if ($livroautor->datafalec)
                            $article->datafalec = $livroautor->datafalec;
                        if ($livroautor->link)
                            $article->link = $livroautor->link;

                        $dbAutor = new LivroautorController();
                        $qAutor = $dbAutor->Livroautor->find('all')->where(['id' => $id])->first();

                        if (
                            (!empty($qAutor->foto) || !empty($article->foto)) AND
                            (!empty($qAutor->autor) || !empty($article->autor)) AND
                            (!empty($qAutor->datanasci) || !empty($article->datanasci)) AND
                            (!empty($qAutor->bio) || !empty($article->bio))
                        )
                        {
                            $article->editavel = 0; // Desabilita edição
                        }

                        if ($articlesTable->save($article)) {
                            $this->score($idUser, $score); // Pontuação
                            $this->Flash->success(__('Registro salvo.'));
                        }

                        // Check se é uma imagem
                        if (isset($_FILES["upload"]["name"][$i])) {
                            $check = getimagesize($target_dir . $foto);

                            if ($check == false) {
                                $this->Flash->error(__('Este arquivo não é uma imagem.'));
                                return $this->redirect(['action' => 'edit', $livroautor->id]);
                            }

                            return $this->redirect(['action' => 'index']);
                        }
                        else {
                            $this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
                        }
                    }
                }
                else {
                    $dbAutor = new LivroautorController();
                    $qAutor = $dbAutor->Livroautor->find('all')->where(['id' => $id])->first();

                    if ($livroautor->bio) {
                        $score += $pontos->autor_bio;
                    }

                    if (
                        (!empty($qAutor->foto) || !empty($livroautor->foto)) AND
                        (!empty($qAutor->autor) || !empty($livroautor->autor)) AND
                        (!empty($qAutor->datanasci) || !empty($livroautor->datanasci)) AND
                        (!empty($qAutor->bio) || !empty($livroautor->bio))
                    )
                    {
                        $livroautor->editavel = 0; // Desabilita edição
                    }

                    if ($this->Livroautor->save($livroautor)) {
                        $this->score($idUser, $score); // Pontuação
                        $this->Flash->success(__('Registro salvo.'));

                        return $this->redirect(['action' => 'index']);
                        // $this->Flash->error(__('Registor não pode ser realizado. tente novamente.'));
                    }
                }
            }

            $this->Flash->error(__('Registro não pode ser realizado. Por favor, tente novamente.'));
        }
        $this->set(compact('livroautor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroautor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroautor = $this->Livroautor->get($id);
        if ($this->Livroautor->delete($livroautor)) {
            $this->Flash->success(__('The livroautor has been deleted.'));
        } else {
            $this->Flash->error(__('The livroautor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livroautor = $this->Livroautor->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroautor = $this->Livroautor->patchEntity($livroautor, $this->request->getData());			
			
			$livroautor->editavel = $value;
			if ($this->Livroautor->save($livroautor)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livroautor->Logs->log_rec($livroautor->id, date('Y-m-d H:s'),'Autor', 'Manutenção', 10, '');
                //$mdlog->log_rec( //para tabelas sem vinculo
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
}
