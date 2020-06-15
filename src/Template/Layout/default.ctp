<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cypherteca';

// Consultas para visualizar dados em todas as páginas
$painelFra = new \App\Model\Table\SubtitulositeTable();
$painelUse = new \App\Model\Table\UsuariosTable();
$painelLiv = new \App\Model\Table\LivrosTable();
$painelCat = new \App\Model\Table\LivrocatTable();
$painelSer = new \App\Model\Table\LivroserieTable();
$painelMai = new \App\Model\Table\UmailTable();
$painelPes = new \App\Model\Table\PesquisasTable();

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
        <?php // $this->fetch('title'); ?>
    </title>
    <?= $this->Html->meta('icon') ?>

 <!-- Fontfaces CSS-->
    <?= $this->Html->css('font-face.css') ?>
	<?= $this->Html->css('font-awesome-4.7/css/font-awesome.min.css') ?>
	<?= $this->Html->css('font-awesome-5/css/fontawesome-all.min.css') ?>
	<?= $this->Html->css('mdi-font/css/material-design-iconic-font.min.css') ?>
   
    <!-- Bootstrap CSS-->
   <?= $this->Html->css('bootstrap-4.1/bootstrap.min.css') ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<div style="border-right: 10px; margin-left: 50px; margin-top: 50px; color:#fff;">  
		<div class="row">
				<div class="col-4">
					<h1><?= $cakeDescription ?></h1>
				</div>     
				
				<div class="col-8" style="padding-top:40px">
					<i>Beta 1.0.2</i>				
				</div>
			
		</div>
	
	<h5><?= $painelFra->frases()->frase ?></h5>
	</div>
	
    <ul style="margin-left: 50px" class="menu"> <!-- Esse é o 1 nivel ou o nivel principal -->
        <li><?= $this->Html->link(__('Index'), ['controller' => 'Pages', 'action' => '/']) ?></li>

        <?php if (!empty($this->request->getSession()->read('Auth.User.id'))) { ?>
        <li><?= $this->Html->link(__('Mural'), ['controller' => 'Mural', 'action' => 'index']) ?></li>
            <li>
            <?= $this->Html->link(__('Livros'), ['controller' => 'Livros', 'action' => 'index']) ?>
            <ul class="submenu-1"> <!-- Esse é o 2 nivel ou o primeiro Drop Down -->
                <li><?= $this->Html->link(__('Todos'), ['controller' => 'Livros', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Incluir'), ['controller' => 'Livros', 'action' => 'add']) ?></li>
                <hr>
				<li>
                    <a href="#">Opções</a>
                    <ul class="submenu-2"> <!-- Esse é o 3 nivel ou o Segundo Drop Down -->
                        <li><?= $this->Html->link(__('Categorias'), ['controller' => 'Livrocat', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Séries'), ['controller' => 'Livroserie', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Editoras'), ['controller' => 'Livroeditoras', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Autores'), ['controller' => 'Livroautor', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Idiomas'), ['controller' => 'Livroidioma', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Tipos'), ['controller' => 'Livrotipos', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Formatos'), ['controller' => 'Livroformatos', 'action' => 'index']) ?></li>

                       <!-- <li><a href="#">Submenu 6</a>
                            <ul class="submenu-3"> // Esse é o 4 nivel ou o Terceiro Drop Down
                                <li><a href="#">Submenu 7</a></li>
                                <li><a href="#">Submenu 8</a></li>
                                <li><a href="#">Submenu 9</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
            </ul>
            </li>
        <!-- Administradores -->
        <?php if (($this->request->getSession()->read('Auth.User.tipo')) > 1) : ?>
        <li>
            <?= $this->Html->link(__('Dashboard'), ['controller' => 'Dashboard', 'action' => 'index']) ?>
		
            <ul class="submenu-1">
				<?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) { ?>
				<li><?= $this->Html->link(__('Solicitações'), ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
				<?php } ?>
				<hr>				
                <li><?= $this->Html->link(__('Usuários'), ['controller' => 'Usuarios', 'action' => 'index']) ?>
                <ul class="submenu-2">
                        <li><?= $this->Html->link(__('Todos'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Novo'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
                        <li><a href="#">Configurações</a>
                            <ul class="submenu-3">
                                <?php if ($this->request->getSession()->read('Auth.User.tipo') > 2) { // Somente Admin ?>
                                    <li><?= $this->Html->link(__('Tipos'), ['controller' => 'Utipos', 'action' => 'index']) ?></li>
                                <?php } ?>
                                <li><?= $this->Html->link(__('Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('Títulos'), ['controller' => 'Titulos', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('Rank'), ['controller' => 'Urank', 'action' => 'index']) ?></li>
                            </ul>
                        <li>
                            <a href="#">Atribuir</a>
                            <ul class="submenu-3">
                                <li><?= $this->Html->link(__('Títulos'), ['controller' => 'Utitulos', 'action' => 'index']) ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
				 <li><a href="#">Livros</a>
                    <ul class="submenu-2">
                        <li><?= $this->Html->link(__('Uploads'), ['controller' => 'Livrolinks', 'action' => 'index']) ?></li>
						<li><?= $this->Html->link(__('Comentários'), ['controller' => 'Livrocomentarios', 'action' => 'index']) ?></li>
                     
					 </ul>
                </li>
                <li><a href="#">Outros</a>
                    <ul class="submenu-2">
                        <li><?= $this->Html->link(__('Tabela de Pontos'), ['controller' => 'Pontos', 'action' => 'edit', 1]) ?></li>
                        <li><?= $this->Html->link(__('Dashboard (Tipos)'), ['controller' => 'Dashtipos', 'action' => 'index']) ?></li>
                        <?php if ($this->request->getSession()->read('Auth.User.tipo') > 2) { ?> <!-- Admin lv 2 -->
						<li><?= $this->Html->link(__('Frases'), ['controller' => 'Subtitulosite', 'action' => 'index']) ?></li>
						<?php }?>
					</ul>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <li>
            <?= $this->Html->link(__($this->request->getSession()->read('Auth.User.nome')),
                ['controller' => 'Usuarios', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')])?>
            <ul class="submenu-1">
                <li><?= $this->Html->link(__('Editar'), ['controller' => 'Usuarios', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')])?></li>
                <li><?= $this->Html->link(__('Box Mail'), ['controller' => 'Umail', 'action' => 'index']) ?></li>
               <!--
               <li><?= $this->Html->link(__('Gerar Convite'), ['controller' => 'Convites', 'action' => 'add']) ?></li>
               -->
                <?php if ($this->request->getSession()->read('Auth.User.tipo') == 1) { ?>
				<li><?= $this->Html->link(__('Solicitações'), ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
				<?php } ?>
                <hr>
                <li><?= $this->Html->link(__('Logout'), ['controller' => 'Usuarios', 'action' => 'logout']) ?></li>

            </ul>
        </li>
        <?php
            $iduser = $this->request->getSession()->read('Auth.User.id');
           // echo $painelMai->countMail($iduser);
            if ($painelMai->countMail($iduser) > 0) :
                ?>
                <li>
                    <i class='material-icons md-24 align-middle'>
                        <?= $this->Form->postLink(__('mail'),
                            ['controller' => 'Umail', 'action' => 'index'],
                            [
                                'type' 		=> 'button',
                                'class' 	=> 'btn btnW btn_warning',
                                'style'     => 'color: #FFBF00 !important',
                                'title' 	=> 'Você tem nova mensagem'
                            ]
                        );
                        ?>
                    </i>
                </li>
        <?php
            endif;
        } else {
            ?> <!-- Usuário não autenticado -->
        <li>
            <li><?= $this->Html->link(__('Livros'), ['controller' => 'Livros', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Registrar-se'), ['controller' => 'Usuarios', 'action' => 'add'])?></li>
            <li><?= $this->Html->link(__('Login'), ['controller' => 'Usuarios', 'action' => 'login'])?></li>
        </li>
    <?php } ?>
    </ul>
    <!-- Menu Superior - fim -->
	<!-- Exibir nome da tabela do DB
	<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
               <h1><a href=""><?= $this->fetch('title') ?></a></h1> 
            </li>
        </ul>
    </nav>
	-->
    <br>
    <br><hr>
    <!-- Conteudo -->
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
        <div class="container">
            <div class="row">                 
				<div class="col-12">
                    <center>
					<?= $cakeDescription ?>
                    <div style="font-size:12px">
					Dev by <?= $this->Html->link(__("Toshokan'noaruji"),
                             ['controller' => 'Usuarios', 'action' => 'view', '2']) ?>                   
					<br>
					Todos os direitos forjados com fogo, sangue e fuligem ; )
					
					</div>
                    </center>
                </div>
				
            </div>
            <br>
			<div class="row">
				<div class="col-sm-12 hidden-md col-lg-3 col-xl-3">
                    <ul style="list-style-type: none">                        
                        <li>
							<a href="<?= $this->Url->build(['controller' => 'Pages',
									'action' => 'faq']) ?>">
							FAQ
							</a>
						</li>
						<li>
							<a href="<?= $this->Url->build(['controller' => 'Pages', 
									'action' => 'politica']) ?>">
							Política
							</a>
						</li>
                        <li>
							<a href="<?= $this->Url->build(['controller' => 'Pages', 
									'action' => 'regras']) ?>">
							Regras
							</a>
						</li>
                        <li>
							<a href="<?= $this->Url->build(['controller' => 'Pages',
									'action' => 'sobre']) ?>">
							Sobre
							</a>
						</li>
                        <li>&nbsp;</li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Pages',
                                    'action' => 'score']) ?>">
                            Pontos
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller' => 'Pages',
                                    'action' => 'titulos']) ?>">
                            Títulos
                            </a>
                        </li>
						<li>&nbsp;</li>
						<li>
							<a  href="https://t.me/cypherteca" target="_blank">
							Telegram
							</a>
						</li>
                    </ul>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <h5><font class="color_prima">Novos Membros</font></h5>
  				    <ul style="list-style-type: none">                        
                       <?php foreach ($painelUse->userID() as $Usersid): ?>
						<li>
							<a href=<?= $this->Url->build(['controller' => 'Usuarios', 
														'action' => 'view', $Usersid->id]) ?>>								
									<?php echo h($Usersid->nome); ?>								
							</a>
						</li>
						<?php endforeach; ?>                       
                    </ul>
                </div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <div title='Rank de atividades'>
					<h5><font class="color_prima">Rank Δ (Top 10)</font></h5>
					</div>
					<ul style="list-style-type: none">
						<?php foreach ($painelUse->userATV() as $UsersRatv):
							if ($UsersRatv->pontos > 0) { ?> 
						<li>
							<a href=<?= $this->Url->build(['controller' => 'Usuarios', 
														'action' => 'view', $UsersRatv->id]) ?>>								
									<?php echo h($UsersRatv->nome) . " [".$UsersRatv->pontos."]"; ?>								
							</a>
						</li>
						<?php } endforeach; ?>
                        <br>
                        <li style="text-align: right">
							<a href="<?= $this->Url->build([
                                    'controller' => 'Usuarios',
                                    'action' => 'rank', 'pontos'									
									] 
                            ) ?>" class="btn">Todos</a>
                        </li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
					<div title='Rank de gratidão'>
					<h5><font class="color_prima">Rank ♥ (Top 10)</font></h5>
					</div>
					<ul style="list-style-type: none">						
                        <?php foreach ($painelUse->userRH() as $UsersHeart):
							if ($UsersHeart->heart > 0) { ?>
						<li>
							<a href=<?= $this->Url->build(['controller' => 'Usuarios',
														'action' => 'view', $UsersHeart->id]) ?>>
								<?php echo h($UsersHeart->nome) . " [".$UsersHeart->heart."]"; ?>
							</a>
						</li>
						<?php } endforeach; ?>
                        <br>
                        <li style="text-align: right">
                            <a href="<?= $this->Url->build([
                                    'controller' => 'Usuarios',
                                    'action' => 'rank', 'heart'									
									] 
                            ) ?>" class="btn">Todos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 hidden-md col-lg-3 col-xl-3"></div>
                <div class="col-sm-12 hidden-md col-lg-9 col-xl-9">
                    <h5><font class="color_prima">Novos Livros</font></h5>
                    <ul style="list-style-type: none">
                        <?php foreach ($painelLiv->livroNovo() as $LivroN): ?>

                            <a href=<?= $this->Url->build(['controller' => 'Livros',
                                'action' => 'view', $LivroN->id]) ?>>
                                <?= h($LivroN->titulo)  ?>
                            </a>&nbsp;

                        <?php  endforeach; ?>
                    </ul>
                </div>
                <div class="col-sm-12 hidden-md col-lg-3 col-xl-3"></div>
                <div class="col-sm-12 hidden-md col-lg-9 col-xl-9">
                    <h5><font class="color_prima">Pesquisas recentes</font></h5>
                    <ul style="list-style-type: none">
                        <?php foreach ($painelPes->ultimasPesquisas() as $pesquisa): ?>

                            <a href=<?= $this->Url->build(['controller' => 'Livros',
                                'action' => 'index?busca='.$pesquisa->termo]) ?>>
                                <?= h($pesquisa->termo)  ?>
                            </a>&nbsp;

                        <?php  endforeach; ?>
                    </ul>
                </div>
            </div>
			
            <!-- Apoio/ parceria -->
            <div class="row" style="margin-bottom: 33px">
				<div class="col-sm-12 hidden-md col-lg-3 col-xl-3"></div>			
				<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
				<h5><font cclass="color_prima">Estatísticas</font></h5>
					<ul style="list-style-type: none">
                       <!-- <font color="#585858"> -->
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-light table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col" width="90">Obras</th>
                                    <th scope="col" width="90">Páginas(≈)</th>
                                    <th scope="col" width="90">Categorias</th>
                                    <th scope="col" width="90">Séries</th>
                                    <th scope="col" width="90">Associados</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <td><?= $painelLiv->livroCount() ?></td>
                                    <td><?= $painelLiv->pageCount() ?></td>
                                    <td><?= $painelCat->catCount() ?></td>
                                    <td><?= $painelSer->serCount() ?></td>
                                    <td><?= $painelUse->useCount() ?></td>
                                </tbody>
                            </table>
                        </div>
                      <!--  </font> -->
                    </ul>
				</div>				
				<div class="col-sm-12 hidden-md col-lg-3 col-xl-3"></div>
				<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
					<a target='_blank' href="https://www.internetdefenseleague.org/">
                        <?= $this->Html->image("cat_face_stencil.png") ?>
                        <br><br>
                        <?= $this->Html->image("IDL_type_logo.png") ?>
                    </a>
                </div>
            </div>
		</div>
    </footer>
</body>
</html>
