<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtitulosite $subtitulosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subtitulosite'), ['action' => 'edit', $subtitulosite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subtitulosite'), ['action' => 'delete', $subtitulosite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtitulosite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subtitulosite'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subtitulosite'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subtitulosite view large-9 medium-8 columns content">
    <h3><?= h($subtitulosite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Frase') ?></th>
            <td><?= h($subtitulosite->frase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subtitulosite->id) ?></td>
        </tr>
    </table>
</div>
