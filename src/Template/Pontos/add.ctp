<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto $ponto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pontos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pontos form large-9 medium-8 columns content">
    <?= $this->Form->create($ponto) ?>
    <fieldset>
        <legend><?= __('Add Ponto') ?></legend>
        <?php
            echo $this->Form->control('user_bio');
            echo $this->Form->control('livro_link');
            echo $this->Form->control('stitulo');
            echo $this->Form->control('capa');
            echo $this->Form->control('autor');
            echo $this->Form->control('n_paginas');
            echo $this->Form->control('categoria');
            echo $this->Form->control('datapub');
            echo $this->Form->control('edicao');
            echo $this->Form->control('editora');
            echo $this->Form->control('idioma');
            echo $this->Form->control('isbn');
            echo $this->Form->control('serie');
            echo $this->Form->control('tags');
            echo $this->Form->control('descri');
            echo $this->Form->control('avalia');
            echo $this->Form->control('comentar');
            echo $this->Form->control('digitalizacao');
            echo $this->Form->control('autoral');
            echo $this->Form->control('rastreio');
            echo $this->Form->control('revisao');
            echo $this->Form->control('traducao');
            echo $this->Form->control('agraecimento');
            echo $this->Form->control('desgosto');
            echo $this->Form->control('palavra_proibida');
            echo $this->Form->control('usuarios._ids', ['options' => $usuarios]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
