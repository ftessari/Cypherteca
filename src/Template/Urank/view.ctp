<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Urank $urank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Urank'), ['action' => 'edit', $urank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Urank'), ['action' => 'delete', $urank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $urank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Urank'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Urank'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="urank view large-9 medium-8 columns content">
    <h3><?= h($urank->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rank') ?></th>
            <td><?= h($urank->rank) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($urank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pontos') ?></th>
            <td><?= $this->Number->format($urank->pontos) ?></td>
        </tr>
    </table>
</div>
