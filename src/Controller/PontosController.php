<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pontos Controller
 *
 * @property \App\Model\Table\PontosTable $Pontos
 *
 * @method \App\Model\Entity\Ponto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PontosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        return $this->redirect(['action' => 'edit', 1]);

        /*$pontos = $this->paginate($this->Pontos);

        $this->set(compact('pontos')); */
    }

    /**
     * View method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        return $this->redirect(['action' => 'edit', 1]);

        /*$ponto = $this->Pontos->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('ponto', $ponto); */
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        return $this->redirect(['action' => 'edit', 1]);

     /*   $ponto = $this->Pontos->newEntity();
        if ($this->request->is('post')) {
            $ponto = $this->Pontos->patchEntity($ponto, $this->request->getData());
            if ($this->Pontos->save($ponto)) {
                $this->Flash->success(__('The ponto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ponto could not be saved. Please, try again.'));
        }
        $usuarios = $this->Pontos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('ponto', 'usuarios')); */
    }

    /**
     * Edit method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
            $ponto = $this->Pontos->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $ponto = $this->Pontos->patchEntity($ponto, $this->request->getData());
                if ($this->Pontos->save($ponto)) {
                    $this->Flash->success(__('Pontos editados com sucesso!'));

                    return $this->redirect(['action' => 'edit', $id]);
                }
                $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
            }
            // $usuarios = $this->Pontos->Usuarios->find('list', ['limit' => 200]);
            //  $this->set(compact('ponto', 'usuarios'));
            $this->set(compact('ponto'));
        } else {
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Ponto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        return $this->redirect(['action' => 'edit', 1]);

        /*$this->request->allowMethod(['post', 'delete']);
        $ponto = $this->Pontos->get($id);
        if ($this->Pontos->delete($ponto)) {
            $this->Flash->success(__('The ponto has been deleted.'));
        } else {
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }

        return $this->redirect(['action' => 'index']); */
    }
}
