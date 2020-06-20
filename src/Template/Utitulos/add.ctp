<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTitulo $usuariosTitulo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>		
		<li>
			<a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn">
			Todos
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
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroidioma', 'action' => 'index']) ?>" class="btn">
			Idiomas
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livrotipos', 'action' => 'index']) ?>" class="btn">
			Tipos
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroformatos', 'action' => 'index']) ?>" class="btn">
			Formatos
			</a>
		</li>
    </ul>
</nav>
<div class="usuariosTitulos form large-9 medium-8 columns content">
    <?= $this->Form->create($utitulos) ?>
    <fieldset>
        <legend><?= __('Adicionar título para usuários') ?></legend>
        <?php
            echo $this->Form->control('id_user', [
		        	'options' 	=> $parentUsuarios,
		        	'type'      => 'select',
		        	'class' 	=> 'form-control form-control-lg',
		        	'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		        	'label' 	=> [
		        		'text' 		=> 'Usuário',
		        		'class' 	=> 'control-label input-label'
		        	]
		        ]);
			echo $this->Form->control('id_titulo', [
		        	'options' 	=> $parentTitulos,
                    'type'      => 'select',
		        	'class' 	=> 'form-control form-control-lg',
		        	'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		        	'label' 	=> [
		        		'text' 		=> 'Título',
		        		'class' 	=> 'control-label input-label'
		        	]
		        ]);				
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 520px',
                    'class' => 'btn',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
