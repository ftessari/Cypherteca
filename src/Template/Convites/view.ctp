<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Convite $convite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Convite'), ['action' => 'edit', $convite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Convite'), ['action' => 'delete', $convite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Convites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convite'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="convites view large-9 medium-8 columns content">
    <h3><?= h($convite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Convite') ?></th>
            <td><?= h($convite->convite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($convite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($convite->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usado') ?></th>
            <td><?= $this->Number->format($convite->usado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Ini') ?></th>
            <td><?= h($convite->data_ini) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Criacao') ?></th>
            <td><?= h($convite->data_criacao) ?></td>
        </tr>
    </table>
</div>
