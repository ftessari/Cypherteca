<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Livrocat Controller
 *
 * @property \App\Model\Table\LivrocatTable $Livrocat
 *
 * @method \App\Model\Entity\Livrocat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrocatController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Livrocat->find('all')->where([
                'AND' => ['Livrocat.categoria <>' => ''] // Remover o primeiro registro padrão da lista
            ])->Order(['Livrocat.categoria' => 'ASC']);
			
		$qlivrocat = $this->paginate($query); 

        $this->set(compact('qlivrocat'));
    }

    /**
     * View method
     *
     * @param string|null $id Livrocat id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livrocat = $this->Livrocat->get($id, [
            'contain' => []
        ]);

        $this->set('livrocat', $livrocat);
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

        $livrocat = $this->Livrocat->newEntity();
        if ($this->request->is('post')) {
            $livrocat = $this->Livrocat->patchEntity($livrocat, $this->request->getData());
            if ($this->Livrocat->save($livrocat)) {
                $this->score($this->request->getSession()->read('Auth.User.id'), $pontos->nova_cat); // Pontuação
                $this->Flash->success(__('Nova categoria incluida.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir nova categoria. Por favor tente novamente ou entre em contrato com a Curadoria.'));
        }
        $this->set(compact('livrocat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livrocat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livrocat = $this->Livrocat->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livrocat->editavel == 0) AND ($this->request->getSession()->read('Auth.User.tipo') < 2)) {
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrocat = $this->Livrocat->patchEntity($livrocat, $this->request->getData());
            if ($this->Livrocat->save($livrocat)) {
                $this->Flash->success(__('Categoria editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir nova categoria. Por favor tente novamente ou entre em contrato com a Curadoria.'));
        }
        $this->set(compact('livrocat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livrocat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livrocat = $this->Livrocat->get($id);
        if ($this->Livrocat->delete($livrocat)) {
            $this->Flash->success(__('The livrocat has been deleted.'));
        } else {
            $this->Flash->error(__('The livrocat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livrocat = $this->Livrocat->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrocat = $this->Livrocat->patchEntity($livrocat, $this->request->getData());			
			
			$livrocat->editavel = $value;
			if ($this->Livrocat->save($livrocat)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livrocat->Logs->log_rec($livrocat->id, date('Y-m-d H:s'),'Categoria', 'Manutenção', 10, '');
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
