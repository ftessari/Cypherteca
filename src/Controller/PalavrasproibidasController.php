<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Palavrasproibidas Controller
 *
 * @property \App\Model\Table\PalavrasproibidasTable $Palavrasproibidas
 *
 * @method \App\Model\Entity\Palavrasproibida[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PalavrasproibidasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $palavrasproibidas = $this->paginate($this->Palavrasproibidas);

        $this->set(compact('palavrasproibidas'));
    }

    /**
     * View method
     *
     * @param string|null $id Palavrasproibida id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $palavrasproibida = $this->Palavrasproibidas->get($id, [
            'contain' => []
        ]);

        $this->set('palavrasproibida', $palavrasproibida);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $palavrasproibida = $this->Palavrasproibidas->newEntity();
        if ($this->request->is('post')) {
            $palavrasproibida = $this->Palavrasproibidas->patchEntity($palavrasproibida, $this->request->getData());
            if ($this->Palavrasproibidas->save($palavrasproibida)) {
                $this->Flash->success(__('Palavra incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('palavrasproibida'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Palavrasproibida id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $palavrasproibida = $this->Palavrasproibidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $palavrasproibida = $this->Palavrasproibidas->patchEntity($palavrasproibida, $this->request->getData());
            if ($this->Palavrasproibidas->save($palavrasproibida)) {
                $this->Flash->success(__('Palavra editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('palavrasproibida'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Palavrasproibida id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $palavrasproibida = $this->Palavrasproibidas->get($id);
        if ($this->Palavrasproibidas->delete($palavrasproibida)) {
            $this->Flash->success(__('The palavrasproibida has been deleted.'));
        } else {
            $this->Flash->error(__('The palavrasproibida could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
