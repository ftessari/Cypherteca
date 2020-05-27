<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Muraltipos Controller
 *
 * @property \App\Model\Table\MuraltiposTable $Muraltipos
 *
 * @method \App\Model\Entity\Muraltipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MuraltiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $muraltipos = $this->paginate($this->Muraltipos);

        $this->set(compact('muraltipos'));
    }

    /**
     * View method
     *
     * @param string|null $id Muraltipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $muraltipo = $this->Muraltipos->get($id, [
            'contain' => []
        ]);

        $this->set('muraltipo', $muraltipo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $muraltipo = $this->Muraltipos->newEntity();
        if ($this->request->is('post')) {
            $muraltipo = $this->Muraltipos->patchEntity($muraltipo, $this->request->getData());
            if ($this->Muraltipos->save($muraltipo)) {
                $this->Flash->success(__('\'Tipo de mensagem incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('muraltipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Muraltipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $muraltipo = $this->Muraltipos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $muraltipo = $this->Muraltipos->patchEntity($muraltipo, $this->request->getData());
            if ($this->Muraltipos->save($muraltipo)) {
                $this->Flash->success(__('Tipo de mensagem editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('muraltipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Muraltipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $muraltipo = $this->Muraltipos->get($id);
        if ($this->Muraltipos->delete($muraltipo)) {
            $this->Flash->success(__('The muraltipo has been deleted.'));
        } else {
            $this->Flash->error(__('The muraltipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
