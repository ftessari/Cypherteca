<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Umail Controller
 *
 * @property \App\Model\Table\UmailTable $Umail
 *
 * @method \App\Model\Entity\Umail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UmailController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if (!empty($_GET['rec_env'])) {
            $rec_env = $_GET['rec_env'];
        }else {
            $rec_env = 0;
        }

        if ($rec_env < 1) {        // Recebidos
            $query = $this->Umail->find('all', ['contain' =>
                ['Usuarios']
            ])->where([
                'Umail.para' => $this->request->getSession()->read('Auth.User.id'),
                'Umail.ativo' => 1
            ]);
        }
        elseif ($rec_env == 1) {    // Enviados
            $query = $this->Umail->find('all', ['contain' =>
                ['Usuarios']
            ])->where([
                'Umail.de' => $this->request->getSession()->read('Auth.User.id'),
                'Umail.ativo' => 1
            ]);
        }
        elseif ($rec_env == 2) {    // Removidos
            $query = $this->Umail->find('all', ['contain' =>
                ['Usuarios']
            ])->where([
                'Umail.ativo' => 0,
                'OR' =>
                    [
                        'Umail.de' => $this->request->getSession()->read('Auth.User.id'),
                        'Umail.para' => $this->request->getSession()->read('Auth.User.id'),
                    ]
            ]);
        }
        else {
            return $this->redirect('/');
        }
			
		$umail = $this->paginate($query);

        $this->set(compact('umail'));
		
		//  $umail = $this->paginate($this->Umail);
        //  $this->set(compact('umail'));
    }

    /**
     * View method
     *
     * @param string|null $id Umail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {	
		$umail = $this->Umail->get($id, [
            'contain' => ['Usuarios']
			]);

		$this->set('umail', $umail);	

		$idUser = $this->request->getSession()->read('Auth.User.id');

		// Se não for do usuário
		if (($umail->de <> $idUser) AND ($umail->para <> $idUser)) {
			return $this->redirect('/');
		}
		
		// Indexar como lido pelo destinatário		
		if (($umail->para == $idUser) AND (empty($umail->data_lido))) {
			$this->Umail->lido($id); // Mode de chamar função do ModelTable (UmailTable.php)
		}		
	}
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $idresp = -1;
		$iddest = -1;

		if (!empty($_GET['idresp'])) {
			$idresp = $_GET['idresp'];
		}

        if (!empty($_GET['iddest'])) {
            $iddest = $_GET['iddest'];
        }
	
		$umail = $this->Umail->newEntity();
        if ($this->request->is('post')) {
            $umail = $this->Umail->patchEntity($umail, $this->request->getData());
            if ($this->Umail->save($umail)) {
                $this->Flash->success(__('Mensagem enviada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível enviar mensagem. Tente novamente ou entre em contato com um administrador.'));
        }
		
        $parentUsuarios = $this->Umail->Usuarios->find('list')->orderAsc('nome');
        $this->set(compact('umail', 'parentUsuarios'));
		
        $this->set(compact('umail', 'idresp', 'iddest'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Umail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $umail = $this->Umail->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $umail = $this->Umail->patchEntity($umail, $this->request->getData());
            if ($this->Umail->save($umail)) {
                $this->Flash->success(__('Mensagem editada com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível editar mensagem. Tente novamente ou entre em contato com um administrador.'));
        }
        
		
        $parentUsuarios = $this->Umail->Usuarios->find('list')->orderAsc('nome');
        $this->set(compact('umail', 'parentUsuarios'));
		
        $this->set(compact('umail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Umail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $umail = $this->Umail->get($id);
        if ($this->Umail->delete($umail)) {
            $this->Flash->success(__('The umail has been deleted.'));
        } else {
            $this->Flash->error(__('The umail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ativa($id = null, $value = 1)
    {
        $umail = $this->Umail->get($id, [
            'contain' => []
        ]);

        //$mdlog = new LogsTable(); //para tabelas sem vinculo FK

        if ($this->request->is(['patch', 'post', 'put'])) {
            $umail = $this->Umail->patchEntity($umail, $this->request->getData());

            $umail->ativo = $value;
            if ($this->Umail->save($umail)) {
                $this->Flash->success(__('Registro salvo.'));
                //  $this->livro->Logs->log_rec($umail->id, date('Y-m-d H:s'),'e-Mail', 'Remoção', 0, '');
                //$mdlog->log_rec( //para tabelas sem vinculo
                return $this->redirect(['action' => 'index']);
            }
        }
    }
}
