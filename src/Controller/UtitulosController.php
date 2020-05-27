<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsuariosTitulos Controller
 *
 * @property \App\Model\Table\UsuariosTitulosTable $UsuariosTitulos
 *
 * @method \App\Model\Entity\UsuariosTitulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UtitulosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Utitulos->find('all', 
		['contain' => ['Usuarios', 'Titulos']]);
		
		$utitulos = $this->paginate($query);
		$this->set(compact('utitulos'));	
		
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Titulo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utitulos = $this->Utitulos->get($id, [
            'contain' => []
        ]);

        $this->set('utitulos', $utitulos);
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

        $utitulos = $this->Utitulos->newEntity();
        if ($this->request->is('post')) {
            $utitulos = $this->Utitulos->patchEntity($utitulos, $this->request->getData());
           // $utitulos->id_user = 8;
           // $utitulos->id_titulo = 1;
            if ($this->Utitulos->save($utitulos)) {
                $this->Flash->success(__('Atribuição de título bem sucedida!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
		
		// Ligações com outras tabelas/ modulos
        $parentUsuarios = $this->Utitulos->Usuarios->find('list')->orderAsc('nome');
        $this->set(compact('utitulos', 'parentUsuarios'));
		
		$parentTitulos = $this->Utitulos->Titulos->find('list')->orderAsc('designacao');
        $this->set(compact('utitulos', 'parentTitulos'));
		
        $this->set(compact('utitulos'));		
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Titulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        $utitulos = $this->Utitulos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utitulos = $this->Utitulos->patchEntity($utitulos, $this->request->getData());
            if ($this->Utitulos->save($utitulos)) {
                $this->Flash->success(__('Atribuição de título bem sucedida!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        
		// Ligações com outras tabelas/ modulos
        $parentUsuarios = $this->Utitulos->Usuarios->find('list')->orderAsc('nome');
        $this->set(compact('utitulos', 'parentUsuarios'));
		
		$parentTitulos = $this->Utitulos->Titulos->find('list')->orderAsc('designacao');
        $this->set(compact('utitulos', 'parentTitulos'));
		
        $this->set(compact('utitulos'));	
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Titulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id_user = null, $id_titulo = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utitulos = $this->Utitulos->get($id_user)->AND($id_titulo);

        if ($this->Utitulos->delete($utitulos)) {
            $this->Flash->success(__('Título removido.'));
        } else {
            $this->Flash->error(__('The usuarios titulo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
