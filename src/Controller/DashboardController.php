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

	// :: BKP
	//public function backup($tables = '*') {
	public function backup() {
/*	
 //ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "123";
    $mysqlHostName      = "localhost";
    $DbName             = "lib";
    $backup_name        = "mybackup.sql";
    $tables             = "livros";

   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content; exit;
    }*/
	
		$hj = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));
		$sqlfile = ROOT.DS.'tmp'.DS.'cypherDump'.$hj.'.sql';
	
		$dbhost =   "localhost";
		$dbuser =   "root";
		$dbpass =   "123";
		$dbname =   "lib";
		
		//$cmd = "mysqldump --all-databases -u ".$dbuser." -p ".$dbpass." --host=".$dbhost." ".$dbname." > ".$sqlfile;
	
		//$cmd = "mysqldump -u".$dbuser." -p".$dbpass." ".$dbname." > ".$sqlfile;
		//$cmd = "mysql --all-databases -h localhost -uroot -p123 lib > g:/aab.sql";
		$cmd = "mysqldump --all-databases -h localhost -uroot -p123 lib > g:/aab.sql";
		//$cmd = "mysqldump -uroot -p123 lib > g:/aab.sql";
		exec($cmd);

	
	//if (file_exists($sqlfile)) {
	if (file_exists('g:/aab.sql')) {
		$this->Flash->success(__('Backup craido :)'));
	} else {
		$this->Flash->error(__('Erro! '. $cmd));
	}
	
	return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);



	/*   $this->layout = $this->autoLayout = $this->autoRender = false;
        if ($tables == '*') {
            $tables = array();
				
			$result = $this->query('SHOW TABLES');
			
            while ($row = mysql_fetch_row($result)) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }
		
		

        foreach ($tables as $table) {
            $result = $this->query('SELECT * FROM ' . $table);
            $num_fields = mysql_num_fields($result);

            $return.= 'DROP TABLE ' . $table . ';';
            $row2 = mysql_fetch_row($this->query('SHOW CREATE TABLE ' . $table));
            $return.= "\n\n" . $row2[1] . ";\n\n";

            for ($i = 0; $i < $num_fields; $i++) {
                while ($row = mysql_fetch_row($result)) {
                    $return.= 'INSERT INTO ' . $table . ' VALUES(';
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $return.= '"' . $row[$j] . '"';
                        } else {
                            $return.= '""';
                        }
                        if ($j < ($num_fields - 1)) {
                            $return.= ',';
                        }
                    }
                    $return.= ");\n";
                }
            }
            $return.="\n\n\n";
        }
        $handle = fopen('db-backup-' . time() . '-' . (md5(implode(',', $tables))) . '.sql', 'w+');
        fwrite($handle, $return);
        fclose($handle); */
    }
	
}
