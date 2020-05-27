<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroautor $livroautor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-danger">
                Autores
            </a>
        </li>
        <hr>
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
        <hr>
    </ul>
</nav>
<div class="livroautor form large-9 medium-8 columns content">
    <?= $this->Form->create($livroautor, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar autor(a)') ?></legend>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <?php
            echo $this->Form->control('autor', [
                'class' => 'form-control form-control-lg',
                'type' 	=> 'text',
                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                'label' => [
                    'text' 	=> 'Autor(a)',
                    'class' => 'control-label input-label'
                ]
            ]);
            echo $this->Form->control('bio', [									
							'type' => 'textarea',
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Biografia'								
							]
						]);
            echo "</div><div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>".
                $this->Form->control('datanasci', ['empty' => true,
                'type' 	=> 'text',
                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                'label' => [
                    'text' 	=> 'Data Nascimento',
                    'class' => 'control-label input-label'
                ]
            ]);
            echo $this->Form->control('datafalec', ['empty' => true,
                'type' 	=> 'text',
                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                'label' => [
                    'text' 	=> 'Falecimento',
                    'class' => 'control-label input-label'
                ]
            ]);
            echo $this->Form->control('link', [
                'class' => 'form-control form-control-lg',
                'type' 	=> 'text',
                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                'label' => [
                    'text' 	=> 'Link',
                    'class' => 'control-label input-label'
                ]
            ]);
            echo $this->Form->control('upload[]',[
                'class' => 'form-control form-control-lg',
                'type' => 'file',
                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                'label' => [
                    'text' 	=> 'Foto',
                    'class' => 'control-label input-label'
                ]
            ]);
            echo $this->Form->control('indie',[
                'empty' => true,
                'type' => 'checkbox',
                'label' => [
                    'text' => 'Autor Indie',
                    'title' => 'Este autor é Independente. Não possui uma editora.'
                ]
            ]);
        ?>
        </div>
    </div>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 140px',
                    'class' => 'btn btnW btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
