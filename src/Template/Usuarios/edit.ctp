<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'view', $usuario->id]) ?>" class="btn">
                Ver
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
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <div class="row">
		<div class="col-12">
			<fieldset>
			<legend><?= __('Editar Usuário') ?></legend>  			
			<?= $this->Form->create($usuario, ['type' => 'file']) ?>	
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <?php
						echo $this->Form->control('nome', 
							[
								'class' => 'form-control form-control-lg',
								'type' => 'text',									
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' => 'Nome',
									'class' => 'control-label input-label'									
								]
							]
						);
						echo $this->Form->control('datanasci',
							[
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',									
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' => 'Data Nascimento',
									'class' => 'control-label input-label'									
								]
							]
						);
						echo $this->Form->control('dataultimo', ['type' => 'hide', 
																'value' =>  date("Y-m-d H:i:s")]);
						echo $this->Form->control('bio', [									
							'type' => 'textarea',
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Biografia'								
							]
						]);
						echo "</div>
							<div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>".
							$this->Form->control('email',
							[
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',									
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' => 'e-Mail',
									'class' => 'control-label input-label'									
								]
							]);
						echo $this->Form->control('site',
							[
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',									
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' => 'Site',
									'class' => 'control-label input-label'									
								]
							]);
						echo $this->Form->control('telegram', 
							[
								'class' => 'form-control form-control-lg',
								'type' => 'text',									
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' => 'Telegram',
									'class' => 'control-label input-label'									
								]
							]);
						echo $this->Form->control('upload[]',[
								'class' => 'form-control form-control-lg',
								'type' => 'file',
								'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
								'label' => [
									'text' 	=> 'Avatar',
									'class' => 'control-label input-label'
								]
							]);
						echo "<div class='notice'>
							<h5>Preferências</h5>";
						echo $this->Form->control('viewmail', 
							[
								'empty' => true,
								'type' => 'checkbox',						
								'label' => [
									'text' => 'Mostrar e-mail',
									'title' => 'Seu e-mail ficará visível para todos',
									
								]
							]);
					
						echo"</div>";	
						echo $this->Form->control('dataultimo', [
							'type' => 'hide',
							'value' => date('Y-m-d H:s')
						]);            
						// echo $this->Form->control('pontos._ids', ['options' => $pontos]);
						// echo $this->Form->control('status._ids', ['options' => $status]);
						// echo $this->Form->control('titulos._ids', ['options' => $titulos]);
					?>
			</div>	
			</div> 			
			</fieldset>
			<div class="text-right">
				<i class='material-icons md-24 align-middle'>
					<?= $this->Form->button(__('Salvar'),
					[
						'style' => 'margin-right: 140px',
						'class' => 'btn'
					]
					); ?>
					<?= $this->Form->end() ?></i>			  
			</div>
		</div>
		
		<!-- Senha -->  
		<div class="col-12">
		<?= $this->Form->create($usuario, ['type' => 'file']) ?>
			<fieldset>          
			<legend><?= __('Alterar Senha') ?></legend>
				<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6"><?php
                    echo $this->Form->control('senha', [
                        'class' => 'form-control form-control-lg',
                        'value' => '',
                        'type' 	=> 'password',
                        'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                        'label' => [
                            'text' 	=> 'Senha',
                            'class' => 'control-label input-label'
                        ]
                    ]);
                    echo "</div>
					<div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>";
                    echo $this->Form->control('senha2', [
                        'class' => 'form-control form-control-lg',
                        'value' => '',
                        'type' 	=> 'password',
                        'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                        'label' => [
                            'text' 	=> 'Confirmação de senha',
                            'class' => 'control-label input-label'
                        ]
                    ]);
					echo $this->Form->control('upload[]', [
								'type' => 'hidden',
								'value' => ''								
							]);
				?>
				</div>
				</div>
			</fieldset>
				<div class="text-right">
					<i class='material-icons md-24 align-middle'>
					<?= $this->Form->button(__('Salvar'),
						[
							'style' => 'margin-right: 140px',
							'class' => 'btn'
						]
					); ?>
		            <?= $this->Form->end() ?></i>
				</div>				
		</div>	
	
		<!-- Admin Board -->  
		<div class="col-12">
		<?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : // Curadoria ?>
			<?= $this->Form->create($usuario, ['type' => 'file']) ?>		
				<fieldset>				
					<legend><?= __('Admin Board') ?></legend>
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<?php
							if ($this->request->getSession()->read('Auth.User.tipo') > 2) { // Somente Admin
								echo $this->Form->control('tipo', [
									'options' 	=> $parentTipos,
									'class' 	=> 'form-control form-control-lg',
									'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
									'label' 	=> [
										'text' 		=> 'Tipo',
										'class' 	=> 'control-label input-label'
									]
								]);
							}
							echo $this->Form->control('idstatus', [
								'options' 	=> $parentStatus,
								'class' 	=> 'form-control form-control-lg',
								'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
								'label' 	=> [
									'text' 		=> 'Status',
									'class' 	=> 'control-label input-label'
								]
							]);
							echo $this->Form->control('pontos', [
								'class' 	=> 'form-control form-control-lg',
								'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
								'label' 	=> [
									'text' 		=> 'Pontos',
									'class' 	=> 'control-label input-label'
								]
							]);							
							echo $this->Form->control('upload[]', [
								'type' => 'hidden',
								'value' => ''								
							]);
						?>
						</div>
					</div>
				</fieldset>
				<div class="text-right">
					<i class='material-icons md-24 align-middle'>
					<?= $this->Form->button(__('Salvar'),
						[
							'style' => 'margin-right: 140px',
							'class' => 'btn'
						]
					); ?>
					<?= $this->Form->end() ?></i>
				</div>
				<br>
		</div>	
		<?php endif; ?>
	</div>
</div>
	
</div>
