<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Umail $umail
 */

$user = new \App\Model\Table\UmailTable();

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Mensagens') ?></li>
		<li>    
			<?= $this->Html->link(__('Mail Box'),
                [
                    'controller' => 'Umail',
                    'action' => 'index'
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

<div class="umail view large-9 medium-8 columns content">
    <h3><?= h($umail->titulo) ?></h3>
	<div class="row">
        <div class="col-12">
            <div class="notice"> 
				<?php
                if ($umail->texto == "MSG_BEMVINDO_TECA") {
                    echo "<p>Estamos muito felizes por você fazer parte de nossa comunidade.<br>
                    Se ainda não leu, por favor, leia as <a href=". $this->Url->build(['controller' => 'Pages',
                    'action' => 'regras']).">Regras</a> 
                    </p> 
                    <p>E mais uma vez, seja muito bem-vindo(a)!</p> 
                    <p>
                    <i><b>P.S.</b> Não responda esta mensagem, eu sou um bot. ok?</i> :3<br> 
                    
                    Dúvidas?<br> 
                    <a href=". $this->Url->build(['controller' => 'Pages',
                            'action' => 'faq']).">F.A.Q.</a>
                    <br>
                    Ou entre me contato com alguém da Curadoria.</p><br>";
                }
                else {
                    $umail->texto;
                }
                ?>
			</div>
            <?php if ($umail->de != 1 ) : ?> // 1 = bot
            <div style="text-align: right" class="col-12">
                <a href="<?= $this->Url->build(
                    [
                        'controller' => 'Umail',
                        'action' => 'add',
                        'idresp' => $umail->id,
                        'iddest' => $umail->de
                    ]
                ) ?>" class="btn btnW btn-danger">
					Responder
                </a>
            </div>
            <?php endif; ?>
		</div>       
	</div>
	<hr>
    <table class="vertical-table">
       <?php if ($umail->para == $this->request->getSession()->read('Auth.User.id')) { 
	   echo "
	    <tr>
            <th scope='row'>De</th>
            <td>
				<a href=". $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $umail->de
                        ]
                    ).">". h($umail->usuario->nome) ."</a>
			</td>
        </tr>";
        } 
		?>
		<?php if ($umail->de == $this->request->getSession()->read('Auth.User.id')) { 
		echo "
		<tr>
            <th scope='row'>Para</th>
            <td> 
			<a href=". $this->Url->build(
                    [
                        'controller' => 'Usuarios',
                        'action' => 'view', $umail->para
                    ]
                ).">". h($user->getNome($umail->para)) ."
			</a>
			</td>
        </tr>";
		} ?>

        <tr>
            <th scope="row"><?= __('Data de Envio:') ?></th>
            <td>
			<?php
				$data_envio = date("d/m/Y H:i", strtotime($umail->data_envio));
                echo $data_envio;
			?>
			</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lido em:') ?></th>
            <td>
			<?php
			// Atribuir como Lido
			if ($umail->para == $this->request->getSession()->read('Auth.User.id')) { 
				//$this->Umail->lido(date('Y-m-d H:s'), $umail->id);
			}	
			
			// Mostrar
			if ($umail->data_lido === null) {
                    $data_lido = '';
                } else {
                    $data_lido = date("d/m/Y H:i", strtotime($umail->data_lido));
                }
                echo $data_lido;
			?>
			</td>
        </tr>
    </table>    
</div>
