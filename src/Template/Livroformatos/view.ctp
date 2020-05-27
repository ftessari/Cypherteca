<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroformato $livroformato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroformato'), ['action' => 'edit', $livroformato->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroformato'), ['action' => 'delete', $livroformato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroformato->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livroformatos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroformato'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livroformatos view large-9 medium-8 columns content">
    <h3><?= h($livroformato->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ext') ?></th>
            <td><?= h($livroformato->ext) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Software') ?></th>
            <td><?= h($livroformato->software) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroformato->id) ?></td>
        </tr>
    </table>
</div>
