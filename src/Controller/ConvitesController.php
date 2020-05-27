<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Convites Controller
 *
 * @property \App\Model\Table\ConvitesTable $Convites
 *
 * @method \App\Model\Entity\Convite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConvitesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $convites = $this->paginate($this->Convites);

        $this->set(compact('convites'));
    }

    /**
     * View method
     *
     * @param string|null $id Convite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $convite = $this->Convites->get($id, [
            'contain' => []
        ]);

        $this->set('convite', $convite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $convite = $this->Convites->newEntity();
        if ($this->request->is('post')) {
            $convite = $this->Convites->patchEntity($convite, $this->request->getData());
            if ($this->Convites->save($convite)) {
                $this->Flash->success(__('The convite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The convite could not be saved. Please, try again.'));
        }
        $this->set(compact('convite'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Convite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $convite = $this->Convites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $convite = $this->Convites->patchEntity($convite, $this->request->getData());
            if ($this->Convites->save($convite)) {
                $this->Flash->success(__('The convite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The convite could not be saved. Please, try again.'));
        }
        $this->set(compact('convite'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Convite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $convite = $this->Convites->get($id);
        if ($this->Convites->delete($convite)) {
            $this->Flash->success(__('The convite has been deleted.'));
        } else {
            $this->Flash->error(__('The convite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
