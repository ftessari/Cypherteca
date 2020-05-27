<?php
namespace App\Controller;

use App\Controller\AppController;
//use Cake\Form\Form;
//use Cake\Form\Schema;
use Cake\ORM\TableRegistry;
/**
 * Livrocomentarios Controller
 *
 * @property \App\Model\Table\LivrocomentariosTable $Livrocomentarios
 *
 * @method \App\Model\Entity\Livrocomentario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrocomentariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {		
        $query = $this->Livrocomentarios->find('all', ['contain' =>
            [
                'Livros', 'Usuarios'
            ]
		]);
			
		$livrocomentarios = $this->paginate($query);

        $this->set(compact('livrocomentarios'));
			
     //   $livrocomentarios = $this->paginate($this->Livrocomentarios);

       // $this->set(compact('livrocomentarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Livrocomentario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // bloquear acesso
        return $this->redirect('/');

        $livrocomentario = $this->Livrocomentarios->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('livrocomentario', $livrocomentario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $idLivro = $_GET['idLivro'];
        $titulo = $_GET['titulo'];

        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array

        $livrocomentario = $this->Livrocomentarios->newEntity();
        if ($this->request->is('post')) {
            $livrocomentario = $this->Livrocomentarios->patchEntity($livrocomentario, $this->request->getData());
            if ($this->Livrocomentarios->save($livrocomentario)) {
                $this->score($this->request->getSession()->read('Auth.User.id'),
                             $pontos->comentar,
                             $idLivro); // Score
                $this->Flash->success(__('Comentário incluído com sucesso!'));

                return $this->redirect(['controller' => 'livros', 'action' => 'view'.DS.$idLivro]);
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }

        $this->set(compact('livrocomentario', 'idLivro', 'titulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livrocomentario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $idLivro = $_GET['idLivro'];
        $titulo = $_GET['titulo'];

        $livrocomentario = $this->Livrocomentarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrocomentario = $this->Livrocomentarios->patchEntity($livrocomentario, $this->request->getData());
            if ($this->Livrocomentarios->save($livrocomentario)) {
                $this->Flash->success(__('Comentário editado com sucesso!'));

                return $this->redirect(['controller' => 'livros', 'action' => 'view'.DS.$idLivro]);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livrocomentario', 'idLivro', 'titulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livrocomentario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livrocomentario = $this->Livrocomentarios->get($id);
        if ($this->Livrocomentarios->delete($livrocomentario)) {
            $this->Flash->success(__('The livrocomentario has been deleted.'));
        } else {
            $this->Flash->error(__('The livrocomentario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livrocomentario = $this->Livrocomentarios->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo com livrocomentario
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrocomentario = $this->Livrocomentarios->patchEntity($livrocomentario, $this->request->getData());			
			
			$livrocomentario->ativo = $value;
			if ($this->Livrocomentarios->save($livrocomentario)) {
				$this->Flash->success(__('Registro salvo.'));
                //$this->Livrocomentarios->Logs->log_rec($livrocomentario->id, date('Y-m-d H:s'),'Usuários', 'Manutenção de usuário', 10, 'texto extra');
                //$mdlog->log_rec( //para tabelas sem vinculo com livrocomentario
				return $this->redirect(['action' => 'index']);
			} 
		}
    }

    // Score
    public function score($id = null, $value = 0, $idlivro = 0)
    {
        $articlesTable = TableRegistry::get('Usuarios');
        $article = $articlesTable->get($id);

        $article->pontos += $value;

        if ($articlesTable->save($article)) {
            //$this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Pontos', $value, '');
            return $this->redirect(['controller' => 'Livros', 'action' => 'view', $idlivro]);
        }
    }

}
