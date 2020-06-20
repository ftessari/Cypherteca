<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Livrolinks Controller
 *
 * @property \App\Model\Table\LivrolinksTable $Livrolinks
 *
 * @method \App\Model\Entity\Livrolink[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LivrolinksController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('nDownload');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->Livrolinks->find('all', ['contain' =>
            [
                'Livros', 'Usuarios'
            ]
		]);
			
		$livrolinks = $this->paginate($query);

        $this->set(compact('livrolinks'));
			
	// $livrolinks = $this->paginate($this->Livrolinks);
    //  $this->set(compact('livrolinks'));
    }

    /**
     * View method
     *
     * @param string|null $id Livrolink id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // bloquear acesso
        return $this->redirect('/');

        $livrolink = $this->Livrolinks->get($id, [
            'contain' => ['Livros', 'Livroformatos']
        ]);

        $this->set('livrolink', $livrolink);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $idLivro = $_GET['idLivro'];
        $titulo = $_GET['titulo'];

		$livrolink = $this->Livrolinks->newEntity();
        
		if ($this->request->is('post')) {
            $livrolink = $this->Livrolinks->patchEntity($livrolink, $this->request->getData());

			$livrolink->link = str_replace('http://', 	'', $livrolink->link);
			$livrolink->link = str_replace('https://', 	'', $livrolink->link);
			$livrolink->link = str_replace('www.', 		'', $livrolink->link);		
          
			if ($this->Livrolinks->save($livrolink)) {
                $dbpontos = new PontosController();
				$pontos = $dbpontos->Pontos->find('all')->where(['id' => 1])->first(); // Especificar row se não pega o array
				$this->score($this->request->getSession()->read('Auth.User.id'), $pontos->livro_link, $livrolink->idlivro); // Score

                $this->Flash->success(__('Link salvo.'));	
                return $this->redirect(['controller' => 'Livros', 'action' => 'view', $livrolink->idlivro]);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }		
		
        $parentFormatos = $this->Livrolinks->Livroformatos->find('list')->orderAsc('id');
        $this->set(compact('livrolink', 'parentFormatos'));
		
        $this->set(compact('livrolink', 'idLivro', 'titulo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Livrolink id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$idLivro = $_GET['idLivro'];
        $titulo = $_GET['titulo'];
		
        $livrolink = $this->Livrolinks->get($id);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
			$livrolink = $this->Livrolinks->patchEntity($livrolink, $this->request->getData());
			
            $livrolink->link = str_replace('http://', '', $livrolink->link);
			$livrolink->link = str_replace('https://', '', $livrolink->link);
			$livrolink->link = str_replace('www.', '', $livrolink->link);
			
			if ($this->Livrolinks->save($livrolink)) {
                $this->Flash->success(__('Link salvo.'));
			
                return $this->redirect(['controller' => 'Livros', 'action' => 'view', $livrolink->idlivro]);
            }
            $this->Flash->error(__('Não foi possível incluir a informação. Tente novamente ou entre em contato com um administrador.'));
        }		
		
        $parentFormatos = $this->Livrolinks->Livroformatos->find('list')->orderAsc('id');
        $this->set(compact('livrolink', 'parentFormatos'));
		
        $this->set(compact('livrolink', 'idLivro' , 'titulo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Livrolink id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livrolink = $this->Livrolinks->get($id);
        if ($this->Livrolinks->delete($livrolink)) {
            $this->Flash->success(__('Link deletado com sucesso!'));
        } else {
            $this->Flash->error(__('Link não pode ser removido.'));
        }

        return $this->redirect(['controller' => 'Livros', 'action' => 'view', $livrolink->idlivro]);
    }
	
	// Ativação
	public function ativa($id = null, $value = 1)
    {		
		$livrolink = $this->Livrolinks->get($id, [
            'contain' => []
        ]);
		
		//$mdlog = new LogsTable(); // para tabelas sem vinculo com Livrolinks
		
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrolink = $this->Livrolinks->patchEntity($livrolink, $this->request->getData());			
			
			$livrolink->ativo = $value;
			if ($this->Livrolinks->save($livrolink)) {
				$this->Flash->success(__('Registro salvo.'));
              //  $this->Livrolinks->Logs->log_rec($livrolink->id, date('Y-m-d H:s'),'Links para Download', 'Manutenção de link', 10, '');
                //$mdlog->log_rec( //para tabelas sem vinculo com Livrolinks
				return $this->redirect(['controller' => 'Livros', 'action' => 'view', $livrolink->idlivro]);
			} 
		}
    }

    // Score
    public function score($id = null, $value = 0, $idlivro = 0)
    {
        $articlesTable = TableRegistry::get('Usuarios');
        $article = $articlesTable->get($id);

        $article->pontos += $value;

        if ($articlesTable->save($article)) {
            //$this->Usuarios->Logs->log_rec($usuario->id, date('Y-m-d H:s'),'Usuários', 'Pontos', $value, '');
            return $this->redirect(['controller' => 'Livros', 'action' => 'view', $idlivro]);
        }
    }
	
	// Número de Downloads
    public function nDownload($id = null, $idlivro = null, $link = '')
    {
	$livrolink = $this->Livrolinks->get($id, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $livrolink = $this->Livrolinks->patchEntity($livrolink, $this->request->getData());			
			
			$livrolink->n_downloads++;

			if ($this->Livrolinks->save($livrolink)) {
				echo "teste 2";
				return $this->redirect("http://".$link);
				//return $this->redirect("http://".$_SERVER[$link]);
				//echo $this->Html->link("http://");
			//	return $this->redirect($this->referer("http://".$link));
			//	return $this->Html->link( '', "http://".$link );
			
			Router::redirect('/posts/*', "http://".$link , array('status' => 302));
			return $this->redirect([
									'controller' => 'Livros',
									'action' => 'view', $idlivro
								]);
				
			}
		}
    }
}
