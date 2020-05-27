<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Umail $umail
 */
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
<div class="umail form large-9 medium-8 columns content">
    <?= $this->Form->create($umail) ?>
    <fieldset>
        <legend><?= __('Nova mensagem') ?></legend>
        <?php
        // Respotas
        if (!empty($_GET['idresp'])) {
            $idresp = $_GET['idresp'];
        }else {
            $idresp = -1;
        }

        // Destinatário
        if (!empty($_GET['iddest'])) {
            $iddest = $_GET['iddest'];
        }else {
            $iddest = -1;
        }

            echo $this->Form->control('idresp', [
                'value' => $idresp,
                'type' => 'hidden'
            ]);
            echo $this->Form->control('titulo');
			echo $this->Form->control('de', [
			    'value' => $this->request->getSession()->read('Auth.User.id'),
                'type' => 'hidden'
            ]);
         if ($iddest == -1) {
            echo $this->Form->control('para', [
                 'options' => $parentUsuarios,
                 'class' => 'form-control form-control-lg',
                 'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                 'label' => [
                     'text' => 'Para',
                     'class' => 'control-label input-label'
                 ]
            ]);
         } else {        // Seleciona destinatário
            echo $this->Form->control('para', [
                 'options' => $parentUsuarios,
                 'class' => 'form-control form-control-lg',
                 'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                 'value' => $this->Number->format($iddest),
			//	 'disabled' => 'true', // Desabilita editar select
                 'label' => [
                     'text' => 'Para',
                     'class' => 'control-label input-label'
                 ]
            ]);
         }
            echo $this->Form->control('texto');			
            echo $this->Form->control('data_envio',
                ['value' => date('Y-m-d H:i:s'),
                'type' => 'hidden'
                ]);

        ?>
    </fieldset>
     <div class="text-right"><i class='material-icons md-24 align-middle'>
        <?= $this->Form->button(__('Enviar'),
            [
                'class' => 'btn btnW btn-success'
               // 'title' => 'Enviar'
            ]
        ); ?>
        <?= $this->Form->end() ?></i>
    </div>
</div>
