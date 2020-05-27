<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Urank Controller
 *
 * @property \App\Model\Table\UrankTable $Urank
 *
 * @method \App\Model\Entity\Urank[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UrankController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $urank = $this->paginate($this->Urank);

        $this->set(compact('urank'));
    }

    /**
     * View method
     *
     * @param string|null $id Urank id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $urank = $this->Urank->get($id, [
            'contain' => []
        ]);

        $this->set('urank', $urank);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 1) :
            return $this->redirect('/');
        endif;

        $urank = $this->Urank->newEntity();
        if ($this->request->is('post')) {
            $urank = $this->Urank->patchEntity($urank, $this->request->getData());
            if ($this->Urank->save($urank)) {
                $this->Flash->success(__('Rank incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The urank could not be saved. Please, try again.'));
        }
        $this->set(compact('urank'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Urank id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // Redirecionar Usuário
        if ($this->request->getSession()->read('Auth.User.tipo') < 1) :
            return $this->redirect('/');
        endif;

        $urank = $this->Urank->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $urank = $this->Urank->patchEntity($urank, $this->request->getData());
            if ($this->Urank->save($urank)) {
                $this->Flash->success(__('Rank editado com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('urank'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Urank id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $urank = $this->Urank->get($id);
        if ($this->Urank->delete($urank)) {
            $this->Flash->success(__('Rank deletado com sucesso!'));
        } else {
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
