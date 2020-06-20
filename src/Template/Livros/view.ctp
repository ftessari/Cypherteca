<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro $livro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn">
                Incluir
            </a>
        </li>
        <hr>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn">
                Autores
            </a>
        </li>
        <hr>

        <li class="heading"><?= __('Categorias') ?></li>
        <span>
            <?php foreach ($qcategoria as $listar):?>
            <a href=<?= $this->Url->build(['controller' => 'Livros', 
											'action' => 'index?busca='.$listar->categoria]) ?>>
                <?php echo $listar->categoria;?>
            </a><br>
        <?php endforeach;?>
        </span>
    </ul>
</nav>
<div class="livros view large-9 medium-8 columns content">
    <h3><?= h($livro->titulo) ?></h3>
    <h5><?= h($livro->subtitulo) ?></h5>
		
    <table class="vertical-table">
	<tr>
		<th scope="row"></th>
		<td scope="row">
			<i class='material-icons md-24 align-middle'>		
			<?= $this->Html->link(__('edit'),
					[
						'action' => 'edit', $livro->id
					],
					[
						'class' => 'btn',
						'title' => 'Editar Obra'
					])
			?>
			</i>
            <?php if (!empty($this->request->getSession()->read('Auth.User.id'))) : ?>
            <?= $this->Html->link(__('!'),
				[
					'controller' => 'Dashboard',
					'action' => 'denunciaUser',
								$this->request->getSession()->read('Auth.User.id'), 
								$livro->id
				],
				[
					'class' => 'btn',
					'title' => 'Denúnciar Obra'
				]) 
			?>
            <?php endif; ?>
		</td>
	</tr>
        <tr>
            <td height="100">
                <?php
                if (!($livro->capa)) {
                    echo $this->Html->image("capas/default.png", [
                        "align" => "right"]);
                } else {
					// Botão para remover avatar pelo admin
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) : 		
						echo "<i class='material-icons md-24 align-middle'>";
						echo $this->Form->postLink(__('X'),
							['action' 	=> 'delImg', $livro->id],
							[																							
								'type' 		=> 'button', 
								'class' 	=> 'btn',
								'confirm' 	=> __('Deseja realmente remover a imagem do registro de {0}?', $livro->titulo),
								'title' 	=> 'Remover Capa',
								'style'     => 'font-size: 12px'
							]
							);
						
						echo "</i><br>";		
					endif;
					
					// Avatar
                    echo $this->Html->image("capas/" . $livro->capa, [
                        "align" => "right"]);
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Onde Comprar') ?></th>
            <td>
			<?php if ($livro->link_comp) {
				$this->Html->link($livro->link_comp, 'http://'.$livro->link_comp, 
							array(
								'class' => 'btn', 
								'target' => '_blank'
								)
							);
			}				
			?>
			</td>
        </tr>
        <!--  <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livro->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Idioma') ?></th>
            <td><?= h($livro->livroidioma->idioma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nº de Páginas') ?></th>
            <td><?= h($livro->n_pag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editora') ?></th>
            <td>
                <?php
					if ($livro->livroeditora->id > 0) {
                     echo "<a href=" .$this->Url->build(
                        [
                            'controller' => 'Livros',
                            'action' => 'index?busca=' . $livro->livroeditora->editora
                        ]
                    ). ">".
                        h($livro->livroeditora->editora).
                    "</a>";
					}
					else {echo h($livro->livroeditora->editora);} // Editora não definido
				?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('ISBN') ?></th>
            <td><?= h($livro->ISBN) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autor') ?></th>
            <td>
                <?php
					if ($livro->livroautor->id > 0) {
                     echo "<a href=" .$this->Url->build(
                        [
                            'controller' => 'Livroautor',
                            'action' => 'view', $livro->livroautor->id
                        ]
                    ). ">".
                        h($livro->livroautor->autor).
                    "</a>";
					}
					else {echo h($livro->livroautor->autor);} // Autor Indefinido
				?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td>
                <?= $this->Html->link(__(h($livro->livrocat->categoria)), [
                    'action' => 'index?busca=' . $livro->livrocat->categoria]) ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Série') ?></th>
            <td>
                <?php
					if ($livro->livroserie->id > 0) {
                     echo "<a href=" .$this->Url->build(
                        [
                            'controller' => 'Livros',
                            'action' => 'index?busca=' . $livro->livroserie->serie
                        ]
                    ). ">".
                        h($livro->livroserie->serie).
                    "</a>";
					}
					else {echo h("");} // Série não definido
				?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edição') ?></th>
            <td><?= $this->Number->format($livro->edicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($livro->livrotipo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publicação') ?></th>
            <td><?= h($livro->ano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tags') ?></th>
            <td>
                <?php
                $arr = explode('#', $livro->tags); // transforma a string em array.

                for($i = 1; $i <  count($arr); $i++){
                    echo "<a href=".$this->Url->build(['controller' => 'Livros',
											'action' => 'index?busca='.$arr[$i]
                        ]).">#".
                  $arr[$i]."</a>";
                }
                ?>
            </td>
        </tr>
    </table>	
    <div class="row">
        <h4><?= __('Sinopse') ?></h4>
        <div class="col-12" type="textarea">            
			<?php
                if ($livro->sinopse) {
                  echo $this->Text->autoParagraph($livro->sinopse);
                } 
				else {
                  echo  "<a href=" .$this->Url->build(
                            ['action' => 'edit', $livro->id]
                            ). " class='btn'>
                                Informe a Sinopse
                        </a>";
                }
            ?>
			<br><br>
        </div>
		
		
		<!-- Likes -->			
		<div class='col-12 notice'>		
		<div class='row'>
		<div class="col-sm-12 col-md-6 col-lg-9 col-xl-9">
		<b>Quem leu:</b><br>
		<?php 
			$scorePos = 0;
			$scoreNeg = 0;
			$scoreTot = 0;
			$scoreMed = 0;
			
			foreach ($pontos as $ponto) {
				// Contagem de pontos			
				if ($ponto->pontos == 1) {
					$scorePos++;
				} elseif ($ponto->pontos == -1) {
					$scoreNeg++;
				} 					
			
				echo "- <a href=" .$this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $ponto->iduser
                        ]
                    ).">".
                        h($ponto->usuario->nome).
                    "</a> ";
			}
	
			if ($countPontos - ($scorePos - $scoreNeg) > 1) {
				$scoreMed = $countPontos / ($scorePos - $scoreNeg);
			} else {
				$scoreMed = 'não definida';
			}
			$scoreTot =  $scorePos - $scoreNeg;			
		?>
		</div>	
		<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3" style="text-align: right">		
		<?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
		<b>Você leu esta obra?</b><br>
		<span>
			<i class='material-icons md-24 align-middle'>
				<?= $this->Form->postLink(__('thumb_up'),
					[
						'controller' => 'livropontos', 'action' => 'add', 
						'idlivro' 	=> $livro->id,
						'ponto' 	=> 1
					],
					[
						'type' 		=> 'button',
						'class' 	=> 'btndvm-button btn-info',
						'confirm' 	=> __('Gostou mesmo desta obra? :)'),								
						'title' 	=> 'Eu li e gostei!'
					]
					);
				?>
			</i>		
			<i class='material-icons md-24 align-middle'>
				<?= $this->Form->postLink(__('thumb_down'),
					[
						'controller' => 'livropontos', 'action' => 'add', 
						'idlivro' 	=> $livro->id,
						'ponto' 	=> -1
					],
					[
						'type' 		=> 'button',
						'class' 	=> 'btndvm-button btn-info',
						'confirm' 	=> __('Tem certeza de que não gostou desta obra? :('),
						'title'		=> 'Eu li e não gostei!'
					]
					);
				?>
			</i>
		</span>
		<hr>
		<?php endif; ?>
		<?php
			echo "
				<i class='material-icons md-24 align-middle'>thumb_up</i>&nbsp;&nbsp;". h($scorePos)."<br>
				<i class='material-icons md-24 align-middle'>thumb_down</i>&nbsp;&nbsp;". h($scoreNeg)."<br>
				Total: ". h($scoreTot)."<br>
				Média: ". h($scoreMed)."<br>";
		?>
		
		</div>
		</div>
		</div>		
		<!--------------->
		
		<!-- Download -->
		<div class="col-12 notice" style="margin-top: 5px; margin-bottom: 5px">
		<b>Downloads:</b><br>
        <div class="col-12">
        <!--<div style="text-align: right" class="col-12"> -->
            <a href="<?= $this->Url->build(
                [
                    'controller' => 'Livrolinks',
                    'action' => 'add',
                    'idLivro' => $livro->id,
                    'titulo' => $livro->titulo
                ],
                [
                    'style' => 'font-size: 12px'
                ]
            ) ?>" class="btn">
                Enviar arquivo
            </a>
        </div><br>		
     
            <!-- Carrega todos o formatos -->
            <?php 
				foreach ($downloads as $download) { 
					if (($download->ativo == 1) || ($this->request->getSession()->read('Auth.User.tipo') > 1)) {
				?>
                <div class="row">
					<div class="col-sm-12 col-md-6 col-lg-9 col-xl-9">					
						<?php 
							$iddown = '';							
							if ($this->request->getSession()->read('Auth.User.tipo') > 1) {
								$iddown = 'id.['.$this->Number->format($download->id).'] ';
							}						
							
							$label = $iddown.'Download';
							if ($download->partes > 0) 
							{$label = $iddown.' Parte '.$this->Number->format($download->partes);}
												
							echo $this->Html->link(
							$label." (.". h($download->livroformato->ext. ")"), "http://".$download->link,							
							[
								'target' => '_blank', 
								'class' => 'btnbtn-sm btn-block'
							]);
                        

						//	echo $this->Form->postLink(__($label.
						//	" (.". h($download->livroformato->ext). ")"),
						//		[ // Contar nº de downloads
						//			'controller' => 'Livrolinks',
						//			'action' => 'nDownload', $download->id, $livro-id, $download->link
						//		],
						//		[
						//			'class' => 'btnbtn-sm btn-block',
						//			'target' => '_blank'
						//		]
						//	);
						   
						?>

						<!-- Pegar nome de Usuarios -->
                        <font size="2px" style="color: #985f0d">
                          <!--  Downloads <?= $download->n_downloads?>&nbsp; -->
                            Enviado por:
                        </font>
						<?= $this->Html->link(__(h($download->usuario->nome)), ['controller' => 'Usuarios',
																				'action' => 'view', $download->iduser]) ?>
                        <br>
						<?php
							if ($download->descricao) {
							echo'<span><font size="2px" style="color: #985f0d">'.h($download->descricao).'</font></span>';
						} ?>
					</div>					
					
					<div class="col-sm-12 col-md-6 col-lg-3 col-xl-3"  style="text-align:right">					
					<!-- Ativação -->
					<?php
                     // Informar Link quebrado
                    if (!empty($this->request->getSession()->read('Auth.User.id'))) {
                        echo $this->Html->link(__(' ! '),
                            [
                                'controller' => 'Dashboard',
                                'action' => 'informeLink', $this->request->getSession()->read('Auth.User.id'),
                                $livro->id,
                                $download->id
                            ],
                            [
                                'class' => 'btn',
                                'title' => 'Denunciar link. (Link quebrado ou contendo virus.)',
                                'style' => 'font-size: 12px'
                            ]
                        );
                    }
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) {  // Controle - somente Admin
							if ($download->ativo == 1) { // Se estiver ativo
								$legenda = "Desativar"; 									
								$ativar = 0;
								$cor_btn= 'btn';
								$icone = 'toggle_on';
							} 
							else {
								$legenda = "Ativar"; 
								$ativar = 1;
								$cor_btn= 'btn';
								$icone = 'toggle_off';
							}	
					?>
						<i class='material-icons md-24 align-middle' style="margin-top: -2px">
							<?= $this->Form->postLink(__($icone),
								['controller' => 'Livrolinks', 'action' => 'ativa', $download->id, $ativar],
								[																							
									'type' 		=> 'button',			
									'class' 	=> $cor_btn,
									'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $download->id),
									'title' 	=> $legenda,
                                    'style' => 'font-size: 12px'
								]
								);
							?>
						</i>
					<?php }
					// Ativação - fim 
					
					if (($this->request->getSession()->read('Auth.User.tipo') > 1) ||
						($this->request->getSession()->read('Auth.User.id') == $download->iduser)) { ?>
						<a href="<?= $this->Url->build(
							[
								'controller' => 'Livrolinks',
								'action' => 'edit', $download->id, 
								'idLivro' => $livro->id,
								'titulo' => $livro->titulo
							]							
						) ?>" class="btn" style ='font-size: 12px'>
							Editar
						</a>
						<?php
						}
					?>	
					</div>                    
                </div>
				<?php } 
				} 
			?>
        </div>
		
		<!-- Comentários -->
        <div style="text-align: left; margin-top: 33px" class="col-12">
            <h4><?= __('Comentários') ?></h4>
        </div>
        <div style="text-align: right" class="col-12">
            <a href="<?= $this->Url->build(
                [
                    'controller' => 'Livrocomentarios',
                    'action' => 'add',
                    'idLivro' => $livro->id,
                    'titulo' => $livro->titulo
                ],
                [
                    'style' => 'font-size: 12px'
                ]
            ) ?>" class="btn">
                Comentar
            </a>
        </div>
        <div class="col-12" style="margin-top: 5px; margin-bottom: 5px">
            <fieldset>
            <!-- Carrega todos o Comentários -->
            <?php foreach ($comentarios as $comentario) { ?>
                <div class="notice">
                    <div class="row">
                    <!-- Pegar nome de Usuarios -->
                        <div class="col-6">
                            <?= $this->Html->link(__(h($comentario->usuario->nome)), ['controller' => 'Usuarios', 'action' => 'view' . DS . $comentario->id_user]) ?>
                        </div>
                        <div class="col-6" style="text-align: right">
                            <?= $this->Html->link(__('Editar'),
                                [
                                    'controller' => 'Livrocomentarios',
                                    'action' => 'edit'.DS. $comentario->id,
                                    'idLivro' => $livro->id,
                                    'titulo' => $livro->titulo
                                ],
                                [
                                   'class'=> 'btn'
                                ]
                            ) ?>
                        </div>
                    </div>
                    <p><?= h($comentario->texto) ?></p>
                </div>
            <?php } ?>
            </fieldset>
        </div>
    </div>
</div>
