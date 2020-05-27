<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livroidioma Controller
 *
 * @property \App\Model\Table\LivroidiomaTable $Livroidioma
 *
 * @method \App\Model\Entity\Livroidioma[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroidiomaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livroidioma = $this->paginate($this->Livroidioma);

        $this->set(compact('livroidioma'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroidioma id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livroidioma = $this->Livroidioma->get($id, [
            'contain' => []
        ]);

        $this->set('livroidioma', $livroidioma);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livroidioma = $this->Livroidioma->newEntity();
        if ($this->request->is('post')) {
            $livroidioma = $this->Livroidioma->patchEntity($livroidioma, $this->request->getData());
            if ($this->Livroidioma->save($livroidioma)) {
                $this->Flash->success(__('Idioma incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroidioma'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroidioma id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livroidioma = $this->Livroidioma->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livroidioma->editavel == 0) AND ($this->request->Session()->read('Auth.User.tipo') < 2)) { 
			return $this->redirect('/');
		}
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroidioma = $this->Livroidioma->patchEntity($livroidioma, $this->request->getData());
            if ($this->Livroidioma->save($livroidioma)) {
                $this->Flash->success(__('Formato editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livroidioma'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroidioma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroidioma = $this->Livroidioma->get($id);
        if ($this->Livroidioma->delete($livroidioma)) {
            $this->Flash->success(__('The livroidioma has been deleted.'));
        } else {
            $this->Flash->error(__('The livroidioma could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livroidioma = $this->Livroidioma->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroidioma = $this->Livroidioma->patchEntity($livroidioma, $this->request->getData());			
			
			$livroidioma->editavel = $value;
			if ($this->Livroidioma->save($livroidioma)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->livroidioma->Logs->log_rec($livroidioma->id, date('Y-m-d H:s'),'Autor', 'Manutenção', 10, '');
                //$mdlog->log_rec( //para tabelas sem vinculo
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
}
