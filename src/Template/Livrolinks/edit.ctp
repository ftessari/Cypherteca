<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrolink $livrolink
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn btn-danger">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn btn-danger">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn btn-danger">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn btn-danger">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn btn-danger">
                Autores
            </a>
        </li>
    </ul>
</nav>
<div class="livrolinks form large-9 medium-8 columns content">
    <?= $this->Form->create($livrolink) ?>
    <fieldset>
        <legend><?= __('Editar Link') ?></legend>
        <ul style="padding-left: 50px" class="notice">           
            Editar link para <i>download</i>.
            <?= __('<br>Pertinente ao título: '.'<b>'. $titulo) .'</b>' ?>
        </ul>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-10">		
				<?php
					echo $this->Form->control('link', [
												'class' => 'form-control form-control-lg',
												'type' 	=> 'text',
												'placeholder' => 'http://',
												'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',												
												'label' => [
													'text' 	=> 'Link',
													'class' => 'control-label input-label'
												]
											]);
					echo $this->Form->control('descricao', [
												'class' => 'form-control form-control-lg',
												'type' 	=> 'text',
												'placeholder' => '',
												'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',												
												'label' => [
													'text' 	=> 'Descrição',
													'class' => 'control-label input-label'
												]
											]);
					echo "</div>
					<div class='col-sm-12 col-md-4 col-lg-4 col-xl-2'>" . 
						$this->Form->control('idformato', [
												'options' 	=> $parentFormatos,
												'class' 	=> 'form-control form-control-lg',
												'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
												'label' 	=> [
													'text' 		=> 'Formatos',
													'class' 	=> 'control-label input-label'
												]
											]);
					echo $this->Form->control('partes', [
												'class' => 'form-control form-control-lg',
												'placeholder' => 'Única',
												'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',	
												'min'=> '0',												
												'label' => [
													'text' 	=> 'Nº da parte',
													'class' => 'control-label input-label'
												]
											]);
					echo $this->Form->control('idlivro', ['value' => $idLivro, 'type' => 'hidden']);
					echo $this->Form->control('iduser', ['value' => $this->request->getSession()->read('Auth.User.id'), 'type' => 'hidden']);
					echo $this->Form->control('dataenvio', [
												'type' => 'hide',
												'value' => date('Y-m-d H:s')
											]);						
				//  echo $this->Form->control('n_downloads');
				?>
			</div>
		</div>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
        <?= $this->Form->button(__('Salvar'),
            [
                'class' => 'btn btnW btn-success',
                'title' => 'Salvar'
            ]
        ); ?>
        <?= $this->Form->end() ?></i>
    </div>
</div>
