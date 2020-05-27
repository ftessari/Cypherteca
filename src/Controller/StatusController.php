<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Status Controller
 *
 * @property \App\Model\Table\StatusTable $Status
 *
 * @method \App\Model\Entity\Status[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $status = $this->paginate($this->Status);

        $this->set(compact('status'));
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Status->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('status', $status);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        $status = $this->Status->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Status->patchEntity($status, $this->request->getData());
            if ($this->Status->save($status)) {
                $this->Flash->success(__('Status incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $usuarios = $this->Status->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('status', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        //$status = $this->Status->get($id, ['contain' => ['Usuarios']]);
        $status = $this->Status->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Status->patchEntity($status, $this->request->getData());
            $total = count($_FILES['upload']['tmp_name']);

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                $this->set('file', $tmpFilePath);
                $ext = @end(explode('.', $_FILES['upload']['name'][$i])); 						// pega extensão
                $foto = $status->id .'.'. $ext; 	// novo nome -> db e patch

                if ($ext) {
                    // Upload
                    $target_dir = WWW_ROOT . 'img' . DS . 'status' . DS;
                    $target_file = $target_dir . basename($foto);        // old- basename($_FILES["upload"]["name"]);

                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check se arquivo já existe
                    if (file_exists($target_file)) {				
						echo unlink($target_file);
					}

                    // Check tamanho do arquivo
                    if ($_FILES["upload"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i]));
                        return $this->redirect(['action' => 'edit', $status->id]);
                        // echo "Desculpe, seu arquivo é maior que 5mb. " . $_FILES["upload"]["size"][$i];
                        //exit();
                    }

                    // Libera formato do arquivo
                    if ($imageFileType != "jpg" && $imageFileType != "png" && 
						$imageFileType != "jpeg" && $imageFileType != "gif" && 
						$imageFileType != "png" && $imageFileType != "jfif") {
						$this->Flash->error("Desculpe, apenas JPG, JPEG, GIF, PNG e JFiF são permitidos.");
						return $this->redirect(['action' => 'edit', $status->id]);
                    }

                    if (move_uploaded_file($tmpFilePath, $target_file)) {
                       // $this->Flash->success(__("O arquivo " . basename($foto) . " foi concluido."));

                        $articlesTable = TableRegistry::get('Status');
                        // $article = $articlesTable->newEntity();

                        $article = $articlesTable->get($id);

                        $article->upload = $foto;
                        $article->icone = $foto;
                        $article->dataultimo = date('Y-m-d H:s');
                        if ($status->nome)
                            $article->nome = $status->nomenclatura;
                        if ($status->datanasci)
                            $article->datanasci = $status->descricao;

                        if ($articlesTable->save($article)) {
                            $this->Flash->success(__('Registro salvo.'));
                        }

                        // Check se é uma imagem
                        if (isset($_FILES["upload"]["name"][$i])) {
                            $check = getimagesize($target_dir . $foto);

                            if ($check == false) {
                                $this->Flash->error(__('Este arquivo não é uma imagem.'));
                                return $this->redirect(['action' => 'edit'.DS.$status->id]);
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
                    if ($this->Status->save($status)) {
                        $this->Flash->success(__('Status editado com sucesso!'));

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
      //  $usuarios = $this->Status->Usuarios->find('list', ['limit' => 200]);
      //  $this->set(compact('status', 'usuarios'));
        $this->set(compact('status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // Redirecionar Usuário
        if (empty($this->request->getSession()->read('Auth.User.id'))) :
            return $this->redirect('/');
        endif;

        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Status->get($id);
        if ($this->Status->delete($status)) {
            $this->Flash->success(__('Status deletado.'));

            $img = WWW_ROOT . 'img' . DS . 'status' . DS;
            if (trim($status->icone) != '') {
                unlink($img . $status->icone); // Deleta arquivo
            }
        } else {
            $this->Flash->error(__('Status não pode ser deletado. Entre em contato com o Dev..'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

