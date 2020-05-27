<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsuariosTipo Controller
 *
 * @property \App\Model\Table\UsuariosTipoTable $UsuariosTipo
 *
 * @method \App\Model\Entity\UsuariosTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UtiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if ($this->request->getSession()->read('Auth.User.tipo') < 3) : // Somente Dev
            return $this->redirect('/');
        endif;

        $utipos = $this->paginate($this->Utipos);

        $this->set(compact('utipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $utipos = $this->Utipos->get($id, [
            'contain' => []
        ]);

        $this->set('utipos', $utipos);
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

        $utipos = $this->Utipos->newEntity();
        if ($this->request->is('post')) {
            $utipos = $this->Utipos->patchEntity($utipos, $this->request->getData());
            if ($this->Utipos->save($utipos)) {
                $this->Flash->success(__('Tipo de usuário incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('utipos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) :
            return $this->redirect('/');
        endif;

        $utipos = $this->Utipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $utipos = $this->Utipos->patchEntity($utipos, $this->request->getData());
            if ($this->Utipos->save($utipos)) {
                $this->Flash->success(__('Tipo de usuário editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('utipos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Tipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $utipos = $this->Utipos->get($id);
        if ($this->Utipos->delete($utipos)) {
            $this->Flash->success(__('The usuarios tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios tipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
