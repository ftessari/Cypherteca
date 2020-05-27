<?php
$user = new \App\Model\Table\UmailTable();
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Mensagens') ?></li>
		<li>    
			<?= $this->Html->link(__('Nova mensagem'),
                [
                    'controller' => 'Umail',
                    'action' => 'add'
                ],
                [
                    'class' => 'btn btn-warning'
                ]
            ); ?>
		</li>
        <li>
            <?= $this->Html->link(__('Recebidas'),
                [
                    'controller' => 'Umail',
                    'action' => 'index',
                    'rec_env' => 0
                ],
                [
                    'class' => 'btn btn-primary'
                ]
            ); ?>
        </li>
        <li>
            <?= $this->Html->link(__('Enviadas'),
                [
                    'controller' => 'Umail',
                    'action' => 'index',
                    'rec_env' => 1
                ],
                [
                    'class' => 'btn btn-primary'
                ]
            ); ?>
        </li>
        <li>
            <?= $this->Html->link(__('Removidas'),
                [
                    'controller' => 'Umail',
                    'action' => 'index',
                    'rec_env' => 2
                ],
                [
                    'class' => 'btn btn-danger'
                ]
            ); ?>
        </li>
    </ul>
</nav>
<div class="umail index large-9 medium-8 columns content">
    <h3>Box Mail</h3>
	<table class="table table-hover info" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
		<?php 
			if (!empty($_GET['rec_env'])) {
				$rec_env = $_GET['rec_env'];
			}else {
				$rec_env = 0;
			} 
		
			echo "	<th scope='col' width='160'>". $this->Paginator->sort('Mail') ."</th>";
			if (($rec_env < 1) || ($rec_env == 2)) { 
			echo "	<th scope='col' width='160'>". $this->Paginator->sort('de') ."</th>";
			}
			elseif (($rec_env == 1) || ($rec_env == 2)) {			
			echo "<th scope='col' width='160'>".  $this->Paginator->sort('para') ."</th>";
             } 
			echo "<th scope='col' width='60'>". $this->Paginator->sort('Envio') ."</th>";
            echo "<th scope='col' width='80'>". $this->Paginator->sort('Lido em')."</th>";
            echo "<th scope='col' width='130' class='actions'>". __('Opções') ."</th>";
		
        echo"</tr>
        </thead>
        <tbody>";
		
        foreach ($umail as $umail): 
            echo "
			<tr>
                <td><a href=". $this->Url->build(
                        [
                            'controller' => 'Umail',
                            'action' => 'view', $umail->id
                        ]
                    ).">". h($umail->titulo) ."</a>
			</td>";
			if (($rec_env < 1) || ($rec_env == 2)) { 
            echo "<td>
				<a href=". $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $umail->de
                        ]
                    ).">". h($umail->usuario->nome) ."</a>
                </td>";
				}
				elseif (($rec_env == 1) || ($rec_env == 2)) { 
				
                echo"<td>
				<a href=". $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $umail->para
                        ]
                    ).">". h($user->getNome($umail->para)) .   	// Pegar dados da tabela com outro id
                "</a>
                </td>";
				 } 
                echo "<td>";                   
						$data_envio = date("d/m/Y H:i", strtotime($umail->data_envio));
						echo $data_envio;
                echo "</td>
                <td>";
				if ($umail->data_lido === null) {
                    $data_lido = '';
                } else {
                    $data_lido = date("d/m/Y H:i", strtotime($umail->data_lido));
                }
                echo $data_lido;
                   
                echo "</td>";
                echo "<td class='actions'>";
                if ($this->Number->format($umail->data_lido === null)) { // Se ainda não foi lido, pode editar -->

						// Ativação 						 
						if (!empty($this->request->getSession()->read('Auth.User.id'))) {  // Controle - somente Admin
							if ($umail->ativo == 1) { // Se estiver ativo
								$legenda = "Remover"; 									
								$ativar = 0; // Desativar
								$cor_btn = 'btn btnW btn-secondary';
								$icone = 'toggle_on';
							} 
							else {
								$legenda = "Ativar"; 
								$ativar = 1; // Ativar
								$cor_btn = 'btn btnW btn-primary';
								$icone = 'toggle_off';
							}
							
							echo 
							"<i class='material-icons md-24 align-middle'>".								
								$this->Form->postLink(__($icone),
									['action' => 'ativa', $umail->id, $ativar],
									[																							
										'type' 		=> 'button',			
										'class' 	=> $cor_btn,
										'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $umail->id),
										'title' 	=> $legenda
									]
									)
							."</i>";							
						} 
						// Ativação - fim						
                        
						echo "&nbsp;<a href=". $this->Url->build(
                            [
                                'action' => 'edit', $umail->id
                            ]
                        ) ." class='btn btnW btn-primary'>
                            Editar
                        </a>";

                } else {
                    echo "<font size='2px' style='color: #985f0d'>Mensagem lida.<br>Não pode ser editada!</font>";
                }
            echo "</td>";
            echo "</tr>";
        endforeach; 
		?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) num total de {{count}}')]) ?></p>
    </div>
</div>
