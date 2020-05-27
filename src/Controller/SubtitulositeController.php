<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subtitulosite Controller
 *
 * @property \App\Model\Table\SubtitulositeTable $Subtitulosite
 *
 * @method \App\Model\Entity\Subtitulosite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubtitulositeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $subtitulosite = $this->paginate($this->Subtitulosite);

        $this->set(compact('subtitulosite'));
    }

    /**
     * View method
     *
     * @param string|null $id Subtitulosite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subtitulosite = $this->Subtitulosite->get($id, [
            'contain' => []
        ]);

        $this->set('subtitulosite', $subtitulosite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subtitulosite = $this->Subtitulosite->newEntity();
        if ($this->request->is('post')) {
            $subtitulosite = $this->Subtitulosite->patchEntity($subtitulosite, $this->request->getData());
            if ($this->Subtitulosite->save($subtitulosite)) {
                $this->Flash->success(__('Nova frase salva com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A frase não pode ser salva. Por favor tente novamente.'));
        }
        $this->set(compact('subtitulosite'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subtitulosite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subtitulosite = $this->Subtitulosite->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subtitulosite = $this->Subtitulosite->patchEntity($subtitulosite, $this->request->getData());
            if ($this->Subtitulosite->save($subtitulosite)) {
                $this->Flash->success(__('A frase foi editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A frase não pode ser salva. Por favor tente novamente.'));
        }
        $this->set(compact('subtitulosite'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subtitulosite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subtitulosite = $this->Subtitulosite->get($id);
        if ($this->Subtitulosite->delete($subtitulosite)) {
            $this->Flash->success(__('Frase deletada.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar a frase. Entre em contato com o Dev.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
