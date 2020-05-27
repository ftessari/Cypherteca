<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livrotipos Controller
 *
 * @property \App\Model\Table\LivrotiposTable $Livrotipos
 *
 * @method \App\Model\Entity\Livrotipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrotiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livrotipos = $this->paginate($this->Livrotipos);

        $this->set(compact('livrotipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Livrotipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livrotipo = $this->Livrotipos->get($id, [
            'contain' => []
        ]);

        $this->set('livrotipo', $livrotipo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livrotipo = $this->Livrotipos->newEntity();
        if ($this->request->is('post')) {
            $livrotipo = $this->Livrotipos->patchEntity($livrotipo, $this->request->getData());
            if ($this->Livrotipos->save($livrotipo)) {
                $this->Flash->success(__('Tipo de livro incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livrotipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livrotipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livrotipo = $this->Livrotipos->get($id, [
            'contain' => []
        ]);
		
		// Desativação de edição
		if (($livrotipo->editavel == 0) AND ($this->request->Session()->read('Auth.User.tipo') < 2)) { 
			return $this->redirect('/');
		}
		
		if ($this->request->is(['patch', 'post', 'put'])) {
            $livrotipo = $this->Livrotipos->patchEntity($livrotipo, $this->request->getData());
            if ($this->Livrotipos->save($livrotipo)) {
                $this->Flash->success(__('Tipo de livro editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('livrotipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livrotipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livrotipo = $this->Livrotipos->get($id);
        if ($this->Livrotipos->delete($livrotipo)) {
            $this->Flash->success(__('The livrotipo has been deleted.'));
        } else {
            $this->Flash->error(__('The livrotipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
		// Ativação
	public function ativa($id = null, $value = 1)
    {
		$livrotipo = $this->Livrotipos->get($id, [
            'contain' => []
        ]);

		//$mdlog = new LogsTable(); //para tabelas sem vinculo FK
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrotipo = $this->Livrotipos->patchEntity($livrotipo, $this->request->getData());			
			
			$livrotipo->editavel = $value;
			if ($this->Livrotipos->save($livrotipo)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livrotipos->Logs->log_rec($livrotipo->id, date('Y-m-d H:s'),'Autor', 'Manutenção', 10, '');
                //$mdlog->log_rec( //para tabelas sem vinculo
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
}
