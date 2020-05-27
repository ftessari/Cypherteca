<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Urank $urank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-danger">
                Incluir
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
<div class="urank form large-9 medium-8 columns content">
    <?= $this->Form->create($urank) ?>
    <fieldset>
        <legend><?= __('Adicionar Rank') ?></legend>
        <?php
        echo $this->Form->control('rank', [
            'class' => 'form-control form-control-lg',
            'type' 	=> 'text',
            'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
            'label' => [
                'text' 	=> 'Rank',
                'class' => 'control-label input-label'
            ]
        ]);
        echo $this->Form->control('pontos', [
            'class' => 'form-control form-control-lg',
            'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
            'label' => [
                'text' 	=> 'Pontos',
                'class' => 'control-label input-label'
            ]
        ]);
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 520px',
                    'class' => 'btn btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
