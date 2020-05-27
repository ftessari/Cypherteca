<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTipo $usuariosTipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuarios Tipo'), ['action' => 'edit', $utipos->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuarios Tipo'), ['action' => 'delete', $utipos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utipos->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios Tipo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuarios Tipo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="utipos view large-9 medium-8 columns content">
    <h3><?= h($utipos->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($utipos->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($utipos->id) ?></td>
        </tr>
    </table>
</div>
