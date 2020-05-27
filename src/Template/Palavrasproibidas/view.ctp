<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Palavrasproibida $palavrasproibida
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Palavrasproibida'), ['action' => 'edit', $palavrasproibida->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Palavrasproibida'), ['action' => 'delete', $palavrasproibida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $palavrasproibida->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Palavrasproibidas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Palavrasproibida'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="palavrasproibidas view large-9 medium-8 columns content">
    <h3><?= h($palavrasproibida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Palavra') ?></th>
            <td><?= h($palavrasproibida->palavra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($palavrasproibida->id) ?></td>
        </tr>
    </table>
</div>
