<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>
        <li class="heading"><?= __('Menu') ?></li>
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
        <?php } else { ?>
			<div style='text-align: center' class='notice2'>
				<a href="<?= $this->Url->build(['controller' => 'Pages', 
											'action' => 'regras']) ?>">
					Por favor, leia as <b>Regras</b> clicando aqui
				</a>
			</div>
            <div style="text-align: center">
            <?= $this->Html->image("system/teca_up.png", [
                "width" => "110px"
            ])
            ?>
            </div>
		<?php } ?>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Registrar-se') ?></legend>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php
            echo $this->Form->control('nome', [
							'class' => 'form-control form-control-lg',
							'type' 	=> 'text',									
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Nome',
								'class' => 'control-label input-label'									
							]
						]);
            echo $this->Form->control('login',[
							'class' => 'form-control form-control-lg',
							'type' 	=> 'text',									
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Login',
								'class' => 'control-label input-label'									
							]
						]);
            echo $this->Form->control('senha', [
							'class' => 'form-control form-control-lg',
							'type' 	=> 'password',									
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Senha',
								'class' => 'control-label input-label'									
							]
						]);
			echo $this->Form->control('senha2', [
							'class' => 'form-control form-control-lg',
							'type' 	=> 'password',									
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Confirmação de senha',
								'class' => 'control-label input-label'									
							]
						]);
			echo $this->Form->control('datanasci',
                         [
                             'empty' => true,
                             'class' => 'form-control form-control-lg',
                             'type' => 'text',
                             'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                             'label' => [
                                 'text' => 'Data Nascimento',
                                 'class' => 'control-label input-label'
                             ]
                         ]
                     );
            echo "</div>
                <div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>".
                $this->Form->control('dataini', [
                            'type' => 'hide',
                            'value' => date('Y-m-d H:s')
                        ]);
			echo $this->Form->control('tipo', [
							'type'	=> 'hidden',					
							'value'	=> 1		// Usuário comum
						]);
			echo $this->Form->control('ativo', [
                            'type'	=> 'hidden',
                            'value'	=> 1		// Usuário ativado
                        ]);							
			echo $this->Form->control('bio', [									
							'type' => 'textarea',
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Biografia'								
							]
						]);
            echo $this->Form->control('email',[							
							'type' => 'email',
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'class' => 'form-control form-control-lg',			
							'label' => [
								'text' 	=> 'e-Mail',
								'class' => 'control-label input-label'									
							]
						]);
            echo $this->Form->control('site',[							
							'type' => 'email',
							'class' => 'form-control form-control-lg',													
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Site',
								'class' => 'control-label input-label'									
							]
						]);
            echo $this->Form->control('telegram',[							
							'type' => 'text',
							'class' => 'form-control form-control-lg',													
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Telegram',
								'class' => 'control-label input-label'									
							]
						]);
          //  echo $this->Form->control('informe_admin');
          //  echo $this->Form->control('pontos._ids', ['options' => $pontos]);
          //  echo $this->Form->control('status._ids', ['options' => $status]);
          //  echo $this->Form->control('titulos._ids', ['options' => $titulos]);
        ?>
            </div>
        </div>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 140px',
                    'class' => 'btn',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
