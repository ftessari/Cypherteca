<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livroavaliacao Controller
 *
 * @property \App\Model\Table\LivroavaliacaoTable $Livroavaliacao
 *
 * @method \App\Model\Entity\Livroavaliacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivroavaliacaoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $livroavaliacao = $this->paginate($this->Livroavaliacao);

        $this->set(compact('livroavaliacao'));
    }

    /**
     * View method
     *
     * @param string|null $id Livroavaliacao id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livroavaliacao = $this->Livroavaliacao->get($id, [
            'contain' => []
        ]);

        $this->set('livroavaliacao', $livroavaliacao);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livroavaliacao = $this->Livroavaliacao->newEntity();
        if ($this->request->is('post')) {
            $livroavaliacao = $this->Livroavaliacao->patchEntity($livroavaliacao, $this->request->getData());
            if ($this->Livroavaliacao->save($livroavaliacao)) {
                $this->Flash->success(__('The livroavaliacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livroavaliacao could not be saved. Please, try again.'));
        }
        $this->set(compact('livroavaliacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livroavaliacao id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livroavaliacao = $this->Livroavaliacao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livroavaliacao = $this->Livroavaliacao->patchEntity($livroavaliacao, $this->request->getData());
            if ($this->Livroavaliacao->save($livroavaliacao)) {
                $this->Flash->success(__('The livroavaliacao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The livroavaliacao could not be saved. Please, try again.'));
        }
        $this->set(compact('livroavaliacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livroavaliacao id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livroavaliacao = $this->Livroavaliacao->get($id);
        if ($this->Livroavaliacao->delete($livroavaliacao)) {
            $this->Flash->success(__('The livroavaliacao has been deleted.'));
        } else {
            $this->Flash->error(__('The livroavaliacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
