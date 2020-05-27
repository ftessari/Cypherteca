<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrotipo $livrotipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livrotipo'), ['action' => 'edit', $livrotipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livrotipo'), ['action' => 'delete', $livrotipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livrotipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livrotipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livrotipo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livrotipos view large-9 medium-8 columns content">
    <h3><?= h($livrotipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($livrotipo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($livrotipo->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livrotipo->id) ?></td>
        </tr>
    </table>
</div>
