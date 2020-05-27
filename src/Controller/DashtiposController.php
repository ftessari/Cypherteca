<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashtipos Controller
 *
 * @property \App\Model\Table\DashtiposTable $Dashtipos
 *
 * @method \App\Model\Entity\Dashtipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashtiposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
            $dashtipos = $this->paginate($this->Dashtipos);

            $this->set(compact('dashtipos'));
        } else {
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Dashtipo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
     return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
     /*$dashtipo = $this->Dashtipos->get($id, [
            'contain' => []
        ]);

        $this->set('dashtipo', $dashtipo);*/
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
            $dashtipo = $this->Dashtipos->newEntity();
            if ($this->request->is('post')) {
                $dashtipo = $this->Dashtipos->patchEntity($dashtipo, $this->request->getData());
                if ($this->Dashtipos->save($dashtipo)) {
                    $this->Flash->success(__('The dashtipo has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The dashtipo could not be saved. Please, try again.'));
            }
            $this->set(compact('dashtipo'));
        } else {
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashtipo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
            $dashtipo = $this->Dashtipos->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $dashtipo = $this->Dashtipos->patchEntity($dashtipo, $this->request->getData());
                if ($this->Dashtipos->save($dashtipo)) {
                    $this->Flash->success(__('The dashtipo has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The dashtipo could not be saved. Please, try again.'));
            }
            $this->set(compact('dashtipo'));

        } else {
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashtipo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
            $this->request->allowMethod(['post', 'delete']);
            $dashtipo = $this->Dashtipos->get($id);
            if ($this->Dashtipos->delete($dashtipo)) {
                $this->Flash->success(__('The dashtipo has been deleted.'));
            } else {
                $this->Flash->error(__('The dashtipo could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);

        } else {
            return $this->redirect(['controller' => 'Livros', 'action' => 'index']);
        }
    }
}
