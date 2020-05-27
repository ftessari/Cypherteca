<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Livroserie Controller
 *
 * @property \App\Model\Table\LivroserieTable $Livroserie
 *
 * @method \App\Model\Entity\Livroserie[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroserieController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livroserie = $this->paginate($this->Livroserie);

		$query = $this->Livroserie->find('all')->where([
                'AND' => ['Livroserie.serie <>' => ''] // Remover o primeiro registro padrão da lista
            ])->Order(['Livroserie.serie' => 'ASC']);
		
		$livroserie = $this->paginate($query);

        $this->set(compact('livroserie'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroserie id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livroserie = $this->Livroserie->get($id, [
            'contain' => []
        ]);

        $this->set('livroserie', $livroserie);
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

        $livroserie = $this->Livroserie->newEntity();
        if ($this->request->is('post')) {
            $livroserie = $this->Livroserie->patchEntity($livroserie, $this->request->getData());
            if ($this->Livroserie->save($livroserie)) {
                $this->score($this->request->getSession()->read('Auth.User.id'), $pontos->nova_serie); // Pontuação
                $this->Flash->success(__('Série incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroserie'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroserie id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livroserie = $this->Livroserie->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livroserie->editavel == 0) AND ($this->request->getSession()->read('Auth.User.tipo') < 2)) {
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroserie = $this->Livroserie->patchEntity($livroserie, $this->request->getData());
            if ($this->Livroserie->save($livroserie)) {
                $this->Flash->success(__('Série editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroserie'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroserie id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroserie = $this->Livroserie->get($id);
        if ($this->Livroserie->delete($livroserie)) {
            $this->Flash->success(__('The livroserie has been deleted.'));
        } else {
            $this->Flash->error(__('The livroserie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livroserie = $this->Livroserie->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroserie = $this->Livroserie->patchEntity($livroserie, $this->request->getData());			
			
			$livroserie->editavel = $value;
			if ($this->Livroserie->save($livroserie)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livroserie->Logs->log_rec($livroserie->id, date('Y-m-d H:s'),'Serie', 'Manutenção', 10, '');
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
