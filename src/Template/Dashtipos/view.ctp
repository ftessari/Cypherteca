<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashtipo $dashtipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dashtipo'), ['action' => 'edit', $dashtipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dashtipo'), ['action' => 'delete', $dashtipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dashtipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dashtipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dashtipo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dashtipos view large-9 medium-8 columns content">
    <h3><?= h($dashtipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($dashtipo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dashtipo->id) ?></td>
        </tr>
    </table>
</div>
