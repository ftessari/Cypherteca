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
            <a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn">
                Autores
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
        <hr>
    </ul>
</nav>
<div class="livroautor form large-9 medium-8 columns content">
    <?= $this->Form->create($livroautor) ?>
    <fieldset>
        <legend><?= __('Adicionar novo(a) autor(a)') ?></legend>
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
                                'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px','label' => [
                                'text' 	=> 'Data Nascimento',
                                'class' => 'control-label input-label'
                            ]
                        ]);
            echo $this->Form->control('datafalec', ['empty' => true,
                             'type' 	=> 'text',
                             'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px','label' => [
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
            echo $this->Form->control('indie',
                [
                    'empty' => true,
                    'type' => 'checkbox',
                    'label' => [
                        'text' => 'Autor Indie',
                        'title' => 'Este autor é Independente. Não possui uma editora.'
                    ]
                ]);
        ?>
            </div></div>
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
