<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Livroeditoras Controller
 *
 * @property \App\Model\Table\LivroeditorasTable $Livroeditoras
 *
 * @method \App\Model\Entity\Livroeditora[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroeditorasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Livroeditoras->find('all')->where([
                'AND' => ['Livroeditoras.editora <>' => ''] // Remover o primeiro registro padrão da lista
            ])->Order(['Livroeditoras.editora' => 'ASC']);
		
		$livroeditoras = $this->paginate($query);


        $this->set(compact('livroeditoras'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroeditora id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livroeditora = $this->Livroeditoras->get($id, [
            'contain' => []
        ]);

        $this->set('livroeditora', $livroeditora);
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

        $livroeditora = $this->Livroeditoras->newEntity();
        if ($this->request->is('post')) {
            $livroeditora = $this->Livroeditoras->patchEntity($livroeditora, $this->request->getData());
            if ($this->Livroeditoras->save($livroeditora)) {
                $this->score($this->request->getSession()->read('Auth.User.id'), $pontos->nova_editora); // Pontuação
                $this->Flash->success(__('Editora incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroeditora'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroeditora id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livroeditora = $this->Livroeditoras->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livroeditora->editavel == 0) AND ($this->request->getSession()->read('Auth.User.tipo') < 2)) {
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroeditora = $this->Livroeditoras->patchEntity($livroeditora, $this->request->getData());
            if ($this->Livroeditoras->save($livroeditora)) {
                $this->Flash->success(__('Editora editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroeditora'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroeditora id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroeditora = $this->Livroeditoras->get($id);
        if ($this->Livroeditoras->delete($livroeditora)) {
            $this->Flash->success(__('The livroeditora has been deleted.'));
        } else {
            $this->Flash->error(__('The livroeditora could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livroeditora = $this->Livroeditoras->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroeditora = $this->Livroeditoras->patchEntity($livroeditora, $this->request->getData());			
			
			$livroeditora->editavel = $value;
			if ($this->Livroeditoras->save($livroeditora)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livroeditora->Logs->log_rec($Livroeditoras->id, date('Y-m-d H:s'),'Editora', 'Manutenção', 10, '');
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
