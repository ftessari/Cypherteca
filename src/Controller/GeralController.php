<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Geral Controller
 *
 * @property \App\Model\Table\GeralTable $Geral
 *
 * @method \App\Model\Entity\Geral[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeralController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $geral = $this->paginate($this->Geral);

        $this->set(compact('geral'));
    }

    /**
     * View method
     *
     * @param string|null $id Geral id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $geral = $this->Geral->get($id, [
            'contain' => []
        ]);

        $this->set('geral', $geral);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $geral = $this->Geral->newEntity();
        if ($this->request->is('post')) {
            $geral = $this->Geral->patchEntity($geral, $this->request->getData());
            if ($this->Geral->save($geral)) {
                $this->Flash->success(__('The geral has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The geral could not be saved. Please, try again.'));
        }
        $this->set(compact('geral'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Geral id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $geral = $this->Geral->get($id, [
            'contain' => []
        ]);
		
		 if ($this->request->is(['patch', 'post', 'put'])) { //['patch', 'post', 'put']
            $geral = $this->Geral->patchEntity($geral, $this->request->getData());
            $total_logo 	= count($_FILES['logo']['tmp_name']);
			$total_livro 	= count($_FILES['livro_capa_padrao']['tmp_name']);
			$total_avatar 	= count($_FILES['avatar_padrao']['tmp_name']);
			
			$total = $total_logo + $total_livro + $total_avatar;

            // Loop through each file
            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath_logo 	= $_FILES['logo']['tmp_name'][$i];
				$tmpFilePath_livro 	= $_FILES['livro_capa_padrao']['tmp_name'][$i];
				$tmpFilePath_avatar = $_FILES['avatar_padrao']['tmp_name'][$i];

                $this->set('file', $tmpFilePath_logo);
				$this->set('file', $tmpFilePath_livro);
				$this->set('file', $tmpFilePath_avatar);
				
                $ext_logo 				= @end(explode('.', $_FILES['logo']['name'][$i])); 						// pega extensão
                $ext_livro_capa_padrao 	= @end(explode('.', $_FILES['livro_capa_padrao']['name'][$i])); 						// pega extensão
                $ext_avatar_padrao 		= @end(explode('.', $_FILES['avatar_padrao']['name'][$i])); 				// pega extensão
                
				$foto_logo 				= 'logo.'. $ext_logo; 	// novo nome -> db e patch
                $foto_livro_capa_padrao = 'capa.'. $ext_livro_capa_padrao; 	// novo nome -> db e patch
                $foto_avatar_padrao 	= 'avatar.'. $ext_avatar_padrao; 	// novo nome -> db e patch

                if ($ext_logo || $ext_livro_capa_padrao || $ext_avatar_padrao) {
                    
					// Upload
                    $target_dir = WWW_ROOT . 'img' . DS . 'system' . DS;
					
					$target_file_logo = '';
					$target_file_livro_capa_padrao = '';
					$target_file_avatar_padrao = '';
					
                    if ($ext_logo)
						$target_file_logo = $target_dir . basename($foto_logo);        // old- basename($_FILES["upload"]["name"]);
					
					if ($ext_livro_capa_padrao)
						$target_file_livro_capa_padrao = $target_dir . basename($foto_livro_capa_padrao);     
					
					if ($ext_avatar_padrao)
						$target_file_avatar_padrao = $target_dir . basename($foto_avatar_padrao);       
					
                    $imageFileType_Logo = strtolower(pathinfo($target_file_logo, PATHINFO_EXTENSION));
                    $imageFileType_Livro = strtolower(pathinfo($target_file_livro_capa_padrao, PATHINFO_EXTENSION));
                    $imageFileType_Avatar = strtolower(pathinfo($target_file_avatar_padrao, PATHINFO_EXTENSION));

                    // Check se arquivo já existe
                    if (file_exists($target_file_logo)) {
                        $this->Flash->error(__("Desculpe, arquivo já existe."));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                       // echo "Desculpe, arquivo já existe.";
                       // exit();
                    }
					if (file_exists($target_file_livro_capa_padrao)) {
                        $this->Flash->error(__("Desculpe, arquivo já existe."));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                       // echo "Desculpe, arquivo já existe.";
                       // exit();
                    }
					if (file_exists($target_file_avatar_padrao)) {
                        $this->Flash->error(__("Desculpe, arquivo já existe."));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                       // echo "Desculpe, arquivo já existe.";
                       // exit();
                    }

                    // Check tamanho do arquivo
                    if ($_FILES["logo"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["logo"]["size"][$i]));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
					if ($_FILES["livro_capa_padrao"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["livro_capa_padrao"]["size"][$i]));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
					if ($_FILES["avatar_padrao"]["size"][$i] > 5000000) {
                        $this->Flash->error(__("Desculpe, seu arquivo é maior que 5mb. " . $_FILES["avatar_padrao"]["size"][$i]));
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }

                    // Libera formato do arquivo
                    if ($imageFileType_Logo != "jpg" && $imageFileType_Logo != "png" && $imageFileType_Logo != "jpeg" 
					&& $imageFileType_Logo != "gif" && $imageFileType_Logo != "png") {
                        echo "Desculpe, apenas JPG, JPEG, GIF e PNG são permitidos.";
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
					if ($imageFileType_Livro != "jpg" && $imageFileType_Livro != "png" && $imageFileType_Livro != "jpeg" 
					&& $imageFileType_Livro != "gif" && $imageFileType_Livro != "png") {
                        echo "Desculpe, apenas JPG, JPEG, GIF e PNG são permitidos.";
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
					if ($imageFileType_Avatar != "jpg" && $imageFileType_Avatar != "png" && $imageFileType_Avatar != "jpeg" 
					&& $imageFileType_Avatar != "gif" && $imageFileType_Avatar != "png") {
                        echo "Desculpe, apenas JPG, JPEG, GIF e PNG são permitidos.";
                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }

					$articlesTable = TableRegistry::get('Geral');
                    // $article = $articlesTable->newEntity();

                    $article = $articlesTable->get($id);
					//  $article->upload = $foto_logo;
					
					if (move_uploaded_file($tmpFilePath_logo, $target_file_logo)) {
                        echo "O arquivo " . basename($foto_logo) . " foi concluido.";						
						if ($foto_logo)
                            $article->logo = $geral->foto_logo;   
                    }  
					if (move_uploaded_file($tmpFilePath_livro, $target_file_livro_capa_padrao)) {
                        echo "O arquivo " . basename($foto_livro_capa_padrao) . " foi concluido.";						
						if ($foto_livro_capa_padrao)
                            $article->logo = $geral->foto_livro_capa_padrao;   
                    } 
					if (move_uploaded_file($tmpFilePath_avatar, $target_file_avatar_padrao)) {
                        echo "O arquivo " . basename($foto_avatar_padrao) . " foi concluido.";						
						if ($foto_avatar_padrao)
                            $article->logo = $geral->foto_avatar_padrao;   
                    } 
                    
					if ($geral->sub_titulo)
                        $article->sub_titulo = $geral->sub_titulo;						 	
					if ($geral->livro_capa_tamanho)
                        $article->livro_capa_tamanho = $geral->livro_capa_tamanho;
					if ($geral->livro_capa_max_x)
                        $article->livro_capa_max_x = $geral->livro_capa_max_x;
					if ($geral->livro_capa_max_y)
                        $article->livro_capa_max_y = $geral->livro_capa_max_y;
					if ($geral->livro_capa_min_x)
                        $article->livro_capa_min_x = $geral->livro_capa_min_x; 
					if ($geral->livro_capa_min_y)
                        $article->livro_capa_min_y = $geral->livro_capa_min_y;
					if ($geral->avatar_tamanho)
                        $article->avatar_tamanho = $geral->avatar_tamanho;
					if ($geral->avatar_max_x)
                        $article->avatar_max_x = $geral->avatar_max_x;
					if ($geral->avatar_max_y)
                        $article->avatar_max_y = $geral->avatar_max_y;
					if ($geral->avatar_min_x)
                        $article->avatar_min_x = $geral->avatar_min_x; 
					if ($geral->avatar_min_y)
                        $article->avatar_min_y = $geral->avatar_min_y;
					if ($geral->info_lateral)
                        $article->info_lateral = $geral->info_lateral;
					if ($geral->rodape)
                        $article->rodape = $geral->rodape;

                    if ($articlesTable->save($article)) {
                        $this->Flash->success(__('Registro salvo.'));
                    }

                    // Check se é uma imagem
                    if (isset($_FILES["logo"]["name"][$i])) {
                        $check_logo = getimagesize($target_file_logo . $foto_logo);

                        if ($check_logo !== false) {
                            echo "Arquivo Ok - " . $check_logo["mime"] . ".";
                        } else {
                            $this->Flash->error(__('Este arquivo não é uma imagem.'));
                            return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                        }

                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
                    else {
                        $this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
                    }
					
					if (isset($_FILES["livro_capa_padrao"]["name"][$i])) {
                        $check_livro = getimagesize($target_file_livro_capa_padrao . $foto_livro_capa_padrao);

                        if ($check_livro !== false) {
                            echo "Arquivo Ok - " . $check_livro["mime"] . ".";
                        } else {
                            $this->Flash->error(__('Este arquivo não é uma imagem.'));
                            return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                        }

                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
                    else {
                        $this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
                    }
					
					if (isset($_FILES["avatar_padrao"]["name"][$i])) {
                        $check_avatar = getimagesize($target_file_avatar_padrao . $foto_avatar_padrao);

                        if ($check_avatar !== false) {
                            echo "Arquivo Ok - " . $check_avatar["mime"] . ".";
                        } else {
                            $this->Flash->error(__('Este arquivo não é uma imagem.'));
                            return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                        }

                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                    }
                    else {
                        $this->Flash->error(__('Desculpe, ocorreu um erro ao subir o arquivo.'));
                    }
                    
                    // $usuarios = $this->Titulos->Usuarios->find('list', ['limit' => 200]);
                    // $this->set(compact('usuario', 'usuarios'));

                    // return $this->redirect(['action' => 'index']);
                }
                else {
                    if ($this->Usuarios->save($geral)) {
                        $this->Flash->success(__('Registro salvo.'));

                        return $this->redirect(['action' => 'edit'.DS.$geral->id]);
                        // $this->Flash->error(__('Registor não pode ser realizado. tente novamente.'));
                    }
                }
            }

            $this->Flash->error(__('Registro não pode ser realizado. Por favor, tente novamente.'));
			
       /* if ($this->request->is(['patch', 'post', 'put'])) {
            $geral = $this->Geral->patchEntity($geral, $this->request->getData());
            if ($this->Geral->save($geral)) {
                $this->Flash->success(__('The geral has been saved.'));

                return $this->redirect(['action' => 'edit'.DS.$geral->id]); // Retornar à mesma Pag
            }
            $this->Flash->error(__('The geral could not be saved. Please, try again.'));
        } */
		 }
        $this->set(compact('geral'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Geral id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $geral = $this->Geral->get($id);
        if ($this->Geral->delete($geral)) {
            $this->Flash->success(__('The geral has been deleted.'));
        } else {
            $this->Flash->error(__('The geral could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
