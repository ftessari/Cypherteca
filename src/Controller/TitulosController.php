<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Titulos Controller
 *
 * @property \App\Model\Table\TitulosTable $Titulos
 *
 * @method \App\Model\Entity\Titulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TitulosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $titulos = $this->paginate($this->Titulos);

        $this->set(compact('titulos'));
    }

    /**
     * View method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $titulo = $this->Titulos->get($id, [
            'contain' => []
        ]);

        $this->set('titulo', $titulo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 1) :
            return $this->redirect('/');
        endif;

        $titulo = $this->Titulos->newEntity();
        if ($this->request->is('post')) {
            $titulo = $this->Titulos->patchEntity($titulo, $this->request->getData());
            if ($this->Titulos->save($titulo)) {
                $this->Flash->success(__('Título de usuário incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
       // $usuarios = $this->Titulos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('titulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        $titulo = $this->Titulos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $titulo = $this->Titulos->patchEntity($titulo, $this->request->getData());
            $total = count($_FILES['upload']['tmp_name']);

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                $this->set('file', $tmpFilePath);
                $ext = @end(explode('.', $_FILES['upload']['name'][$i])); 						// pega extensão
                $foto = $titulo->id .'.'. $ext; 	// novo nome -> db e patch

                if ($ext) {
                    // Upload
                    $target_dir = WWW_ROOT . 'img' . DS . 'titulos' . DS;
                    $target_file = $target_dir . basename($foto);        // old- basename($_FILES["upload"]["name"]);

                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check se arquivo já existe
                    if (file_exists($target_file)) {				
						echo unlink($target_file);
					}

                    // Check tamanho do arquivo
                    if ($_FILES["upload"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i]));
                        return $this->redirect(['action' => 'edit', $titulo->id]);
                        // echo "Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i];
                        //exit();
                    }

                    // Libera formato do arquivo
                    if ($imageFileType != "jpg" && $imageFileType != "png" && 
						$imageFileType != "jpeg" && $imageFileType != "gif" && 
						$imageFileType != "png" && $imageFileType != "jfif") {
						$this->Flash->error("Desculpe, apenas JPG, JPEG, GIF, PNG e JFiF são permitidos.");
						return $this->redirect(['action' => 'edit', $titulo->id]);
                    }

                    if (move_uploaded_file($tmpFilePath, $target_file)) {
                       // $this->Flash->success(__("O arquivo " . basename($foto) . " foi concluido."));

                        $articlesTable = TableRegistry::get('Titulos');
                        // $article = $articlesTable->newEntity();

                        $article = $articlesTable->get($id);

                        $article->upload = $foto;
                        $article->icone = $foto;
                        if ($titulo->designacao)
                            $article->designicao = $titulo->designacao;
                        if ($titulo->descricao)
                            $article->descricao = $titulo->descricao;
                        if ($titulo->exigencia)
                            $article->exigencia = $titulo->exigencia;

                        if ($articlesTable->save($article)) {
                            $this->Flash->success(__('Registro salvo.'));
                        }

                        // Check se é uma imagem
                        if (isset($_FILES["upload"]["name"][$i])) {
                            $check = getimagesize($target_dir . $foto);

                            if ($check == false) {
                                $this->Flash->error(__('Este arquivo não é uma imagem.'));
                                return $this->redirect(['action' => 'edit', $titulo->id]);
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
                    if ($this->Titulos->save($titulo)) {
                        $this->Flash->success(__('Título de usuário editado com sucesso!'));

                        return $this->redirect(['action' => 'index']);
                        // $this->Flash->error(__('Registor não pode ser realizado. tente novamente.'));
                    }
                }
            }

            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
            /*   $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
                if ($this->Usuarios->save($usuario)) {
                    $this->Flash->success(__('The usuario has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            } */

            // $pontos = $this->Usuarios->Pontos->find('list', ['limit' => 200]);
            // $status = $this->Usuarios->Status->find('list', ['limit' => 200]);
            // $titulos = $this->Usuarios->Titulos->find('list', ['limit' => 200]);
            // $this->set(compact('usuario', 'pontos', 'status', 'titulos'));
        }
       // $usuarios = $this->Titulos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('titulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $titulo = $this->Titulos->get($id);
        if ($this->Titulos->delete($titulo)) {
            $this->Flash->success(__('The titulo has been deleted.'));
        } else {
            $this->Flash->error(__('The titulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
