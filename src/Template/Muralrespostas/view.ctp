<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muralresposta $muralresposta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Muralresposta'), ['action' => 'edit', $muralresposta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Muralresposta'), ['action' => 'delete', $muralresposta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $muralresposta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Muralrespostas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Muralresposta'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="muralrespostas view large-9 medium-8 columns content">
    <h3><?= h($muralresposta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($muralresposta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iduser') ?></th>
            <td><?= $this->Number->format($muralresposta->iduser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($muralresposta->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idmural') ?></th>
            <td><?= $this->Number->format($muralresposta->idmural) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moderador') ?></th>
            <td><?= $this->Number->format($muralresposta->moderador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dataini') ?></th>
            <td><?= h($muralresposta->dataini) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dataalt') ?></th>
            <td><?= h($muralresposta->dataalt) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($muralresposta->texto)); ?>
    </div>
</div>
