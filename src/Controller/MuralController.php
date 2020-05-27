<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Mural Controller
 *
 * @property \App\Model\Table\MuralTable $Mural
 *
 * @method \App\Model\Entity\Mural[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MuralController extends AppController
{
    public function beforeFilter(Event $event)
	{
		// Liberado. Não precisa estar logado
		parent::beforeFilter($event);
			$this->Auth->allow('index'); 
			$this->Auth->allow('view'); 
	}
	/**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $mural = $this->paginate($this->Mural);

        if (!empty($_GET['busca'])) {
            $busca = $_GET['busca'];
            if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
                $query = $this->Mural->find('all', ['contain' => ['Usuarios', 'Muraltipos']])
                    ->where([
                        'OR' =>
                            [
                                'Mural.titulo LIKE' => $busca . '%',
                                'Mural.texto LIKE' => $busca . '%'
                            ]
                    ]);
            } else {
                $query = $this->Mural->find('all', ['contain' => ['Usuarios', 'Muraltipos']])
                    ->where([
                        'OR' =>
                            [
                                'Mural.titulo LIKE' => $busca . '%',
                                'Mural.texto LIKE' => $busca . '%'
                            ],
                        'AND' => [
                            'Mural.ativo = 1' // Somente os ativos para usuários comum
                        ]
                    ]);
            }
        } else {
            if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
                $query = $this->Mural->find('all', ['contain' =>
                    [
                        'Usuarios', 'Muraltipos'
                    ]
                ]);
            } else {
                $query = $this->Mural->find('all', ['contain' =>
                    [
                        'Usuarios', 'Muraltipos'
                    ]
                ])->where([
                    'AND' => [
                        'Mural.ativo = 1' // Somente os ativos para usuários comum
                    ]
                ]);
            }
        }
        $qmural = $this->paginate($query);

        $this->set(compact('qmural'));
    }

    /**
     * View method
     *
     * @param string|null $id Mural id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dbrespostas = new MuralrespostasController();

        $mural = $this->Mural->get($id, [
            'contain' => ['Usuarios', 'Muraltipos']
        ]);
        $muralrespostas = $dbrespostas->Muralrespostas->find('all', [
            'contain' => ['Usuarios']
        ]);

        // $this->set('mural', $mural);
        $this->set(compact('mural', $mural, 'muralrespostas'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mural = $this->Mural->newEntity();
        if ($this->request->is('post')) {
            $mural = $this->Mural->patchEntity($mural, $this->request->getData());
            if ($this->Mural->save($mural)) {
                $this->Flash->success(__('Mensagem incluído com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }

        // Ligações com outras tabelas/ modulos
        $parentTipos = $this->Mural->Muraltipos->find('list')->orderAsc('tipo');
        $this->set(compact('mural', 'parentTipos'));

        $this->set(compact('mural'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mural id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mural = $this->Mural->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mural = $this->Mural->patchEntity($mural, $this->request->getData());
            if ($this->Mural->save($mural)) {
                $this->Flash->success(__('Mensagem editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        // Ligações com outras tabelas/ modulos
        $parentTipos = $this->Mural->Muraltipos->find('list')->orderAsc('tipo');
        $this->set(compact('mural', 'parentTipos'));

        $this->set(compact('mural'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mural id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mural = $this->Mural->get($id);
        if ($this->Mural->delete($mural)) {
            $this->Flash->success(__('The mural has been deleted.'));
        } else {
            $this->Flash->error(__('The mural could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // Ativação
    public function ativa($id = null, $value = 1)
    {
        $this->request->allowMethod(['post', 'get']);
        $mural = $this->Mural->get($id, [
            'contain' => []
        ]);

        $mural->ativo = $value;

        if ($this->Mural->save($mural)) {
            $this->Flash->success(__('Registro salvo.'));

              if ($value == 1) {$info = 'Ativou';} else {$info = 'Desativou';}
              $this->Mural->Logs->log_rec($mural->iduser, date('Y-m-d H:s'),'Mural', $info. ' mensagem do mural', '0', 'Mensagem nº: '. $mural->id);

        }
        // return $this->redirect(['action' => 'view', $id]);

      //  exit($mural->ativo);
     return $this->redirect(['action' => 'index']);
    }
}
