<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livroformatos Controller
 *
 * @property \App\Model\Table\LivroformatosTable $Livroformatos
 *
 * @method \App\Model\Entity\Livroformato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroformatosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livroformatos = $this->paginate($this->Livroformatos);

        $this->set(compact('livroformatos'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroformato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livroformato = $this->Livroformatos->get($id, [
            'contain' => []
        ]);

        $this->set('livroformato', $livroformato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livroformato = $this->Livroformatos->newEntity();
        if ($this->request->is('post')) {
            $livroformato = $this->Livroformatos->patchEntity($livroformato, $this->request->getData());
            if ($this->Livroformatos->save($livroformato)) {
                $this->Flash->success(__('Formato incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroformato'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroformato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livroformato = $this->Livroformatos->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livroformato->editavel == 0) AND ($this->request->Session()->read('Auth.User.tipo') < 2)) { 
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroformato = $this->Livroformatos->patchEntity($livroformato, $this->request->getData());
            if ($this->Livroformatos->save($livroformato)) {
                $this->Flash->success(__('Formato editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroformato'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroformato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroformato = $this->Livroformatos->get($id);
        if ($this->Livroformatos->delete($livroformato)) {
            $this->Flash->success(__('The livroformato has been deleted.'));
        } else {
            $this->Flash->error(__('The livroformato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livroformato = $this->Livroformatos->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroformato = $this->Livroformatos->patchEntity($livroformato, $this->request->getData());			
			
			$livroformato->editavel = $value;
			if ($this->Livroformatos->save($livroformato)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livroformatos->Logs->log_rec($livroformato->id, date('Y-m-d H:s'),'Autor', 'Manutenção', 10, '');
                //$mdlog->log_rec( //para tabelas sem vinculo
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
}
