<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Dashboard Controller
 *
 * @property \App\Model\Table\DashboardTable $Dashboard
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Usuário comum ve somente suas solicitações
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) {
            $query = $this->Dashboard->find('all',
                ['contain' => ['Dashtipos', 'Usuarios']])->where([
                'AND' =>
                    ['iduser' => $this->request->getSession()->read('Auth.User.id')]
            ]);
        }
        // Admin
        elseif ($this->request->getSession()->read('Auth.User.tipo') > 1) {
            $query = $this->Dashboard->find('all',
                ['contain' => ['Dashtipos', 'Usuarios']]);
        }

        $dashboards = $this->paginate($query);

        $this->set(compact('dashboards'));
    }

    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => ['Dashtipos', 'Usuarios']
        ]);

        $this->set('dashboard', $dashboard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboard->newEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('Informação incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
		
		// Ligações com outras tabelas/ modulos
        $parentSolicita = $this->Dashboard->Dashtipos->find('list')->orderAsc('tipo');
        $this->set(compact('dashboard', 'parentSolicita'));
		
        //$this->set(compact('dashboard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());
            if ($this->Dashboard->save($dashboard)) {
                $this->Flash->success(__('Informação incluída com sucesso!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }
        $parentSolicita = $this->Dashboard->Dashtipos->find('list')->orderAsc('tipo');
        $this->set(compact('dashboard', 'parentSolicita'));
		
		//$this->set(compact('dashboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboard->get($id);
        if ($this->Dashboard->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {
		$dashboard = $this->Dashboard->get($id, [
            'contain' => []
        ]);

		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());			
			
			$dashboard->status = $value;
			if ($this->Dashboard->save($dashboard)) {
				$this->Flash->success(__('Registro salvo.'));
             //   $this->Dashboard->Logs->log_rec($dashboard->id, date('Y-m-d H:s'),'Dashboard', 'Manutenção de solicitações', 0, '');
                //$mdlog->log_rec( //para tabelas sem vinculo com Dashboard
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
	
	// Conclusão
	public function conclusao($id = null)
    {
		$dashboard = $this->Dashboard->get($id, [
            'contain' => []
        ]);

		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboard->patchEntity($dashboard, $this->request->getData());			
			
			$dashboard->dataconclusao = date('Y-m-d H:s');
			if ($this->Dashboard->save($dashboard)) {
				$this->Flash->success(__('Solicitação concluida.'));
             //   $this->Dashboard->Logs->log_rec($dashboard->id, date('Y-m-d H:s'),'Dashboard', 'Manutenção de solicitações', 0, '');
                //$mdlog->log_rec( //para tabelas sem vinculo com Dashboard
				return $this->redirect(['action' => 'index']);
			} 
		}
    }
	
	// --- Informes ----------------------------------------------------------------------
	// :: Denunciar Usuário
	public function denunciaUser($iduser = null, $idacusado = null)
    {
        $articles = TableRegistry::getTableLocator()->get('Dashboard');
        $article = $articles->newEntity();

        $article->solicitacao = 0; // Denúncia = 0; Comunicado = 1, Link = 2
        $article->iduser = $iduser; // enviou o informe
        $article->descricao  = 'Verificar perfil do associado.';
        $article->alvo = $idacusado;
        $article->datainfo = date('Y-m-d H:s');
        $article->status = 1; // Início
        //	$article->resposta = $dashboard->resposta;
        //	$article->dataconclusao = date('Y-m-d H:s');
        //	$article->idmod = $dashboard->idmod;

        if ($this->Dashboard->save($article)) {
            $this->Flash->success(__('Denúncia realizada.'));
            return $this->redirect(['controller' => 'Usuarios', 'action' => 'view', $idacusado]);
        }

        $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'.$article));
    }
	
	// :: Denunciar Autor
	public function denunciaAutor($iduser = null, $idacusado = null)
    {
        $articles = TableRegistry::getTableLocator()->get('Dashboard');
        $article = $articles->newEntity();

        $article->solicitacao = 0; // Denúncia = 0; Comunicado = 1, Link = 2
        $article->iduser = $iduser; // enviou o informe
        $article->descricao  = 'Verificar perfil do autor.';
        $article->alvo = $idacusado;
        $article->datainfo = date('Y-m-d H:s');
        $article->status = 1; // Início
        //	$article->resposta = $dashboard->resposta;
        //	$article->dataconclusao = date('Y-m-d H:s');
        //	$article->idmod = $dashboard->idmod;

        if ($this->Dashboard->save($article)) {
            $this->Flash->success(__('Denúncia realizada.'));
            return $this->redirect(['controller' => 'Livroautor', 'action' => 'view', $idacusado]);
        }

        $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'.$article));
    }	

    // :: Denunciar Link 
    public function informeLink($iduser = null, $idLivro  = null, $idlink = null)
    {
        $articles = TableRegistry::getTableLocator()->get('Dashboard');
        $article = $articles->newEntity();

        $article->solicitacao = 2; // Denúncia = 0; Comunicado = 1, Link = 2
        $article->iduser = $iduser; // enviou o informe
        $article->descricao  = 'Verificar o id:';
        $article->alvo = $idLivro;
		$article->idlink = $idlink;
        $article->datainfo = date('Y-m-d H:s');
        $article->status = 1; // Início
        //	$article->resposta = $dashboard->resposta;
        //	$article->dataconclusao = date('Y-m-d H:s');
        //	$article->idmod = $dashboard->idmod;

        if ($this->Dashboard->save($article)) {
            $this->Flash->success(__('Link informado como quebrado.'));
            return $this->redirect(['controller' => 'Livros', 'action' => 'view', $idLivro]);
        }

        $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'.$article));
    }



}
