<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtitulosite $subtitulosite
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
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroidioma', 'action' => 'index']) ?>" class="btn btn-danger">
                Idiomas
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livrotipos', 'action' => 'index']) ?>" class="btn btn-danger">
                Tipos
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroformatos', 'action' => 'index']) ?>" class="btn btn-danger">
                Formatos
            </a>
        </li>
    </ul>
</nav>
<div class="subtitulosite form large-9 medium-8 columns content">
    <?= $this->Form->create($subtitulosite) ?>
    <fieldset>
        <legend><?= __('Editar Sub-título') ?></legend>
        <?php
            echo $this->Form->control('frase');
        ?>
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
