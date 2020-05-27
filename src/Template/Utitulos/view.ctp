<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTitulo $usuariosTitulo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuarios Titulo'), ['action' => 'edit', $utitulos->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuarios Titulo'), ['action' => 'delete', $utitulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utitulos->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios Titulos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuarios Titulo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuariosTitulos view large-9 medium-8 columns content">
    <h3><?= h($utitulos->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($utitulos->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($utitulos->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Titulo') ?></th>
            <td><?= $this->Number->format($utitulos->id_titulo) ?></td>
        </tr>
    </table>
</div>
