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
                    'class' => 'btn'
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
                    'class' => 'btn'
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
                    'class' => 'btn'
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
                    'class' => 'btn'
                ]
            ); ?>
        </li>
    </ul>
</nav>
<div class="umail form large-9 medium-8 columns content">
    <?= $this->Form->create($umail) ?>
    <fieldset>
        <legend><?= __('Editar Mensagem') ?></legend>
        <?php
		 echo $this->Form->control('titulo');
			echo $this->Form->control('de', ['value' => $this->request->getSession()->read('Auth.User.id'), 'type' => 'hidden']);
         /*   echo "<div class='row'>
			<div class='col-6'>";*/
			echo $this->Form->control('para', [
		            					'options' 	=> $parentUsuarios,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'Para',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
         /*   echo "</div><div class='col-6'>".
				$this->Form->control('cc', [
		            					'options' 	=> $parentUsuarios,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'C.C.',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
            echo "</div> 
			</div>";     */
            echo $this->Form->control('texto');			
            echo $this->Form->control('data_envio', ['value' => date('Y-m-d H:i:s'), 'type' => 'hidden']);
          //  echo $this->Form->control('data_lido', ['empty' => true]);
           
        ?>
    </fieldset>
	<div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
