<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pesquisas Controller
 *
 * @property \App\Model\Table\PesquisasTable $Pesquisas
 *
 * @method \App\Model\Entity\Pesquisa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PesquisasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pesquisas = $this->paginate($this->Pesquisas);

        $this->set(compact('pesquisas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pesquisa = $this->Pesquisas->get($id, [
            'contain' => []
        ]);

        $this->set('pesquisa', $pesquisa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  /*  public function add()
    {
        $pesquisa = $this->Pesquisas->newEntity();
        if ($this->request->is('post')) {
            $pesquisa = $this->Pesquisas->patchEntity($pesquisa, $this->request->getData());
            if ($this->Pesquisas->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
        }
        $this->set(compact('pesquisa'));
    } */
	
	    public function search()
    {
        $pesquisa = $this->Pesquisas->newEntity();
        if ($this->request->is('post')) {
            $pesquisa = $this->Pesquisas->patchEntity($pesquisa, $this->request->getData());
            if ($this->Pesquisas->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
        }
        $this->set(compact('pesquisa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pesquisa = $this->Pesquisas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pesquisa = $this->Pesquisas->patchEntity($pesquisa, $this->request->getData());
            if ($this->Pesquisas->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
        }
        $this->set(compact('pesquisa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pesquisa = $this->Pesquisas->get($id);
        if ($this->Pesquisas->delete($pesquisa)) {
            $this->Flash->success(__('The pesquisa has been deleted.'));
        } else {
            $this->Flash->error(__('The pesquisa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
