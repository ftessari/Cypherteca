<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroeditora $livroeditora
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroeditora'), ['action' => 'edit', $livroeditora->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroeditora'), ['action' => 'delete', $livroeditora->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroeditora->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livroeditoras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroeditora'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livroeditoras view large-9 medium-8 columns content">
    <h3><?= h($livroeditora->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Editora') ?></th>
            <td><?= h($livroeditora->editora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($livroeditora->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroeditora->id) ?></td>
        </tr>
    </table>
</div>
