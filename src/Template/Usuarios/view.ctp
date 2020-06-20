<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns notice" id="actions-sidebar">
    <ul class="side-nav">	
	<?php if ($usuario->id > 1) : ?>
		<li>
			<?= $this->Html->link(__('Livros enviados'),
                [
                    'controller' => 'Livros',
                    'action' => 'index?iduser='.$usuario->id
                ],
                [
                    'class' => 'btn'
                ]
            ); ?>
		</li>
		<li>		
			<?= $this->Html->link(__('Enviar mensagem'),
                [
                    'controller' => 'Umail',
                    'action' => 'add', 
					'iddest' => $usuario->id,
					'idresp' => -1 // Não é uma resposta
                ],
                [
                    'class' => 'btn'
                ]
            ); ?>		
		</li>
        <?php endif; ?>
		
		<li>
            <b>Corações da gratidão :3</b><br>
            <?php
                if ($this->request->getSession()->read('Auth.User.id')) {
                    if ($this->request->getSession()->read('Auth.User.id') <> $usuario->id) {
                    echo "<i>(Quer agradecer a este associado?)</i><br>
                            <div class='text-muted bg-white stldiv'>
		                	<i class='material-icons md-24 align-middle'>" .
		                		 $this->Form->postLink(__('favorite'),
                                    [
                                        'controller' => 'Usuarios', 'action' => 'addHeart', $usuario->id
                                    ],
                                    [
                                        'style'     => 'width: 60px; font-size:33px; color: #dc143c !important;',
                                        'class' 	=> 'btn',
                                        'title' 	=> 'Muito obrigado!!'
                                    ]
                                )
                                ."
                            </i>
                            <b><font size='4px'>(". h($usuario->heart) .")</font></b>
                            </div>";
                    }
                    else {
                        echo "<div class='text-muted bg-white stldiv'>
                            <i style='width: 60px; font-size:33px; color: #dc143c !important;' class='material-icons md-24 align-middle'>favorite</i>";
                            if ($usuario->heart) { echo "<b><font size='4px'>(". h($usuario->heart). ")</font></b>"; }
                        echo "</div>";
                    }
                } else {
                    echo "<div class='text-muted bg-white stldiv'>
                        <i style='width: 60px; font-size:33px; color: #dc143c !important;' class='material-icons md-24 align-middle'>favorite</i>";
                        if ($usuario->heart) { echo "<b><font size='4px'>(". h($usuario->heart). ")</font></b> ";}
                    echo "</div>";
                 }
            ?>
        </li>
		
        <br>
        <li>
            <table class="vertical-table">
                <tr>
                    <th width="60px" scope="row"><?= __('') ?></th>
                    <td><b><?= h($usuario->utipo->tipouser) ?></b></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Data Nasc.') ?></th>
                    <td>
                        <?php
                        if ($usuario->datanasci === null) {
                            $datanasci = '';
                        } else {
                            $datanasci = date("d/m/Y", strtotime($usuario->datanasci));
                        }

                        echo $datanasci;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Inscrição') ?></th>
                    <td>
                        <?php
                        if ($usuario->dataini === null) {
                            $dataini = '';
                        } else {
                            $dataini = date("d/m/Y H:i:s", strtotime($usuario->dataini));
                        }

                        echo $dataini;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Último acesso') ?></th>
                    <td>
                        <?php
                        if ($usuario->datault === null) {
                            $datault = '';
                        } else {
                            $datault = date("d/m/Y H:i:s", strtotime($usuario->datault));
                        }

                        echo $datault;
                        ?>
                    </td>
                </tr>
				<?php if ($usuario->telegram) : ?>
                <tr>
					<th scope="row"><?= __('Telegram') ?></th>
                    <td>
                        <a target="_blank" href="https://t.me/<?= h($usuario->telegram) ?>">
                            <?= h($usuario->telegram) ?>
                        </a>
                    </td>
                </tr>  
				<?php endif; ?>
				
				<?php if ($usuario->viewmail == 1) : ?>
				<tr>
					<th scope="row"><?= __('e-mail') ?></th>
					<td><?= h($usuario->email) ?></td>
				</tr> 
				<?php endif; ?>					
            </table>
        </li>        
		
        <div class="notice2">
            <center>
				<div style="font-family: karmatic_arcade; padding-top: 20px; padding-bottom: 20px">
					<?= __('Ficha Tecnica') ?>
				</div>
			</center>
			<div style="margin-left: 10px; margin-right: 10px">
			
			<h3><?= __('Status') ?></h3>
			<li>
				<?php
					if (!$status->icone) {
						$icone = '1.png'; // padrão
						$nomenclatura = 'Ativo';
					} else {
						$icone = $status->icone;
						$nomenclatura = $status->nomenclatura;
					}
	
					echo $this->Html->image("status/" . $icone, [
							"align" => "center",
							//"title" => $status->nomenclatura
							]);
					echo "<b>&nbsp;&nbsp;". $nomenclatura ."</b>";
				?>
				<br>
			</li>
		<?php if ($usuario->titulos) :?>
		<h3><?= __('Titulos') ?></h3
		<li>
            <?php
            foreach ($usuario->titulos as $listar):
                echo $this->Html->image("titulos/" . $listar->icone, [
                    "align" => "center",
					"style" => "margin-top: 3px",
                    "title" => $listar->descricao
                ]) ."&nbsp;&nbsp;<b>". $listar->designacao."</b><br>";
            endforeach;
            ?>
		</li>
		<?php endif; ?>
        <h3><?= __('Rank') ?></h3>
        <li>
            <?php
            if ($usuario->pontos <= 0) {
                $score = 0;
            } else {
                $score = $usuario->pontos;
            }
			echo "<div id='skema01'>
                    <center><b>";
			if ($score > 0) {
				echo $urank->rank."&nbsp;&nbsp;".$score;
			} else {
				echo $score;	
			}
			echo "</center></b>
			</div>";
            ?>
        </li>
		</div>
        <br>
        </div>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
   <table class="vertical-table">
		<tr>
			<th scope="row">
                <?php
                if ($usuario->status >= 4) {
                    echo "<h4><strike>" . h($usuario->nome) . "</strike></h4>";
                } else {
                    echo "<h4><b>" . h($usuario->nome) . "</b></h4>";
                }
				?>
			</th>	
			<td scope="row">
			<?php
            if (($this->request->getSession()->read('Auth.User.id')) AND
                (
                    ($this->request->getSession()->read('Auth.User.id') == $usuario->iduser) ||
                    ($this->request->getSession()->read('Auth.User.tipo') > 1)
                )
                ):
                    echo "<i class='material-icons md-24 align-middle'>".
					$this->Html->link(__('edit'),
                        [
                            'action' => 'edit', $usuario->id
                        ],
                        [
                            'class' => 'btn',
                            'title' => 'Editar Associado'
                        ]
                    ). "</i>";
                endif;
            echo "&nbsp;";
			if (($this->request->getSession()->read('Auth.User.id'))
				AND ($this->request->getSession()->read('Auth.User.id') <> $usuario->id)) : 
				echo $this->Html->link(__('!'),
					[
						'controller' => 'Dashboard',
						'action' => 'denunciaUser',
									$this->request->getSession()->read('Auth.User.id'), 
									$usuario->id
					],
					[
						'class' => 'btn',
						'title' => 'Denúnciar usuário'
					]
				);
			endif; ?>
			</td>
		</tr>
		<tr>
            <td height="100">
                <?php
                if (!($usuario->avatar)) {
                    echo $this->Html->image("users/default.png", [
                        "align" => "right"]);
                } else {
					// Botão para remover avatar pelo admin
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) : 	
	
				echo "<i class='material-icons md-24 align-middle'>".
					 $this->Form->postLink(__('delete'),
                            [   'action' => 'delImg', $usuario->id],
							[
								'type' 		=> 'button',
								'class' 	=> 'btn',
                                'confirm' 	=> __('Deseja realmente remover a imagem do registro de {0}?', $usuario->id),
                                'title' 	=> 'Remover'
							]
							).
                      "</i><br>";		
					endif;
					
					// Avatar
                    echo $this->Html->image("users/" . $usuario->avatar, [
                        "align" => "right"]);
                }
                ?>
            </td>
        </tr>
    </table>
	<div class="row">
		<?php if ($usuario->bio) : ?>		
			<h4><?= __('Sobre') ?></h4>
			<div class="col-12">
				<?= $this->Text->autoParagraph($usuario->bio)?>
				<br>
			</div>		
		<?php endif; ?>				
		<br>
		<?php if ($usuario->informe_admin): ?> <!-- Aviso da administração -->  
			<h4><?= __('Informe Administrativo') ?></h4>
			<div class="col-12">
				<?= $this->Text->autoParagraph(h($usuario->informe_admin)); ?>
			</div>    
		<?php endif; ?>
	</div>
</div>
