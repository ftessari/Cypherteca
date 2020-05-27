<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroponto $livroponto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroponto'), ['action' => 'edit', $livroponto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroponto'), ['action' => 'delete', $livroponto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroponto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livropontos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroponto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livropontos view large-9 medium-8 columns content">
    <h3><?= h($livroponto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroponto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idlivro') ?></th>
            <td><?= $this->Number->format($livroponto->idlivro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iduser') ?></th>
            <td><?= $this->Number->format($livroponto->iduser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pontos') ?></th>
            <td><?= $this->Number->format($livroponto->pontos) ?></td>
        </tr>
    </table>
</div>
