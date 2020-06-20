<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Livropontos Controller
 *
 * @property \App\Model\Table\LivropontosTable $Livropontos
 *
 * @method \App\Model\Entity\Livroponto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivropontosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // bloquear acesso
        return $this->redirect('/');

        $livropontos = $this->paginate($this->Livropontos);

        $this->set(compact('livropontos'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroponto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // bloquear acesso
        return $this->redirect('/');

        $livroponto = $this->Livropontos->get($id, [
            'contain' => []
        ]);

        $this->set('livroponto', $livroponto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Verificar se já votou neste livro
		if (!empty($_GET['idlivro'])) {
            $idlivro = $_GET['idlivro'];
		} 
		else {
			$idlivro = -1;
		}
		
		if (!empty($_GET['ponto'])) {
            $ponto = $_GET['ponto'];
		} 
		else {
			$ponto = 0;
		}
		
		$query = $this->Livropontos->find('all')->where([  
			'iduser' => $this->request->Session()->read('Auth.User.id'),
			'idlivro' => $idlivro		
        ]);
		
		$PontosporUser = $this->paginate($query);
		$count = $PontosporUser->count();
		//----------------------------------------------
		
		if ($count > 0) {
			$this->Flash->success(__('Você já classificou esta obra.'));
			return $this->redirect(['controller' => 'Livros', 'action' => 'view', $idlivro]);	
		}

        $articles = TableRegistry::get('Livropontos');
		$article = $articles->newEntity();

		$article->idlivro = $idlivro;					
		$article->iduser = $this->request->Session()->read('Auth.User.id');
		$article->pontos = $ponto;

        $dbpontos = new PontosController();
        $pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array

        if ($this->Livropontos->save($article)) {
            $this->score($article->iduser, $pontos->avalia); // Pontos por avaliar obra
            $this->Flash->success(__('Obrigado por sua dica :)'));

            return $this->redirect(['controller' => 'Livros', 'action' => 'view', $article->idlivro]);
        }

        $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'.$article));

    }

    /**
     * Edit method
     *
     * @param string|null $id Livroponto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // bloquear acesso
        return $this->redirect('/');

        $livroponto = $this->Livropontos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroponto = $this->Livropontos->patchEntity($livroponto, $this->request->getData());
            if ($this->Livropontos->save($livroponto)) {
                $this->Flash->success(__('The livroponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livroponto could not be saved. Please, try again.'));
        }
        $this->set(compact('livroponto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroponto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // bloquear acesso
        return $this->redirect('/');

        $this->request->allowMethod(['post', 'delete']);
        $livroponto = $this->Livropontos->get($id);
        if ($this->Livropontos->delete($livroponto)) {
            $this->Flash->success(__('The livroponto has been deleted.'));
        } else {
            $this->Flash->error(__('The livroponto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // Score
    public function score($id = null, $value = 0)
    {
        $articlesTable = TableRegistry::get('Usuarios');
        $article = $articlesTable->get($id);

        $article->pontos += $value;

        if ($articlesTable->save($article)) {
            //$this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Pontos', $value, '');
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }
}
