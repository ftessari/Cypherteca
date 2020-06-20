<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <div style='text-align: center' class='notice2'>
				Bemvindo(a)!<br><br>
            Ainda não se registrou?<br>
				
			<a href="<?= $this->Url->build(['controller' => 'Pages', 
											'action' => 'regras']) ?>">
					Por favor, leia as <b>Regras</b> clicando aqui
				</a>
        </div>
        <div style="text-align: center">
            <?= $this->Html->image("system/teca_avatar.png", [
                "width" => "110px"
            ])
            ?>
        </div>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border"><?= __('Autenticação') ?></legend>
		<div class="row">
		<div class="col-4">			
			<div class="input-group">
				<span class="input-group-addon">
					<!--<i class="zmdi zmdi-hc-3x zmdi-face"></i> -->
				<?php
					echo $this->Form->control('login',
						[
							'type' => 'text',
							'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
							'class' => 'form-control form-control-lg',
							'label' => [
								'text' => 'Usuário',
								'style' => 'margin-top: 5px',
								'class' => 'control-label input-label'
							]
						]
					);
					echo $this->Form->control('senha', 
						[
							'type' => 'password',
							'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
							'class' => 'form-control form-control-lg',					
							'label' => [
								'text' => 'Senha',
								'style' => 'margin-top: 5px',
								'class' => 'control-label input-label'
							]
						]
					);
				?>
					<div class="text-right">
						<?= $this->Form->button(__('Entrar'), 
							[
								'style' => 'margin-right: 550px',		
								'class' => 'btn'
							]
						);
						?>
					</div>
					<div><?= $this->Html->link(__('Registrar-se'), ['controller' => 'Usuarios', 'action' => 'add'])?></div>
				</span>
			</div>
		</div>
    </fieldset>
   	
    <?= $this->Form->end() ?>
</div>
