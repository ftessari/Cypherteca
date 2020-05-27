<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Muralrespostas Controller
 *
 * @property \App\Model\Table\MuralrespostasTable $Muralrespostas
 *
 * @method \App\Model\Entity\Muralresposta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MuralrespostasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $muralrespostas = $this->paginate($this->Muralrespostas);

        $this->set(compact('muralrespostas'));
    }

    /**
     * View method
     *
     * @param string|null $id Muralresposta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $muralresposta = $this->Muralrespostas->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('muralresposta', $muralresposta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $idMural = $_GET['idMural'];
        $titulo = $_GET['titulo'];

        $muralresposta = $this->Muralrespostas->newEntity();
        if ($this->request->is('post')) {
            $muralresposta = $this->Muralrespostas->patchEntity($muralresposta, $this->request->getData());
            if ($this->Muralrespostas->save($muralresposta)) {
                $this->Flash->success(__('Resposta incluído com sucesso!'));

                return $this->redirect(['controller' => 'Mural', 'action' => 'view/'.$idMural]);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('muralresposta', 'idMural', 'titulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Muralresposta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $idMural = $_GET['idMural'];
        $titulo = $_GET['titulo'];
        $modera = $_GET['modera'];

        $muralresposta = $this->Muralrespostas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $muralresposta = $this->Muralrespostas->patchEntity($muralresposta, $this->request->getData());
            if ($this->Muralrespostas->save($muralresposta)) {
                $this->Flash->success(__('\'Resposta incluído com sucesso!'));

                return $this->redirect(['controller' => 'Mural', 'action' => 'view/'.$idMural]);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $this->set(compact('muralresposta', 'idMural', 'titulo', 'modera'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Muralresposta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $muralresposta = $this->Muralrespostas->get($id);
        if ($this->Muralrespostas->delete($muralresposta)) {
            $this->Flash->success(__('The muralresposta has been deleted.'));
        } else {
            $this->Flash->error(__('The muralresposta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
