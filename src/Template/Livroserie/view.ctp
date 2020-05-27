<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroserie $livroserie
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroserie'), ['action' => 'edit', $livroserie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroserie'), ['action' => 'delete', $livroserie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroserie->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livroserie'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroserie'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livroserie view large-9 medium-8 columns content">
    <h3><?= h($livroserie->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Serie') ?></th>
            <td><?= h($livroserie->serie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroserie->id) ?></td>
        </tr>
    </table>
</div>
