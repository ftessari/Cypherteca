<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muralresposta[]|\Cake\Collection\CollectionInterface $muralrespostas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Muralresposta'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="muralrespostas index large-9 medium-8 columns content">
    <h3><?= __('Muralrespostas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dataini') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iduser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dataalt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idmural') ?></th>
                <th scope="col"><?= $this->Paginator->sort('moderador') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($muralrespostas as $muralresposta): ?>
            <tr>
                <td><?= $this->Number->format($muralresposta->id) ?></td>
                <td><?= h($muralresposta->dataini) ?></td>
                <td><?= $this->Number->format($muralresposta->iduser) ?></td>
                <td><?= $this->Number->format($muralresposta->status) ?></td>
                <td><?= h($muralresposta->dataalt) ?></td>
                <td><?= $this->Number->format($muralresposta->idmural) ?></td>
                <td><?= $this->Number->format($muralresposta->moderador) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $muralresposta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $muralresposta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $muralresposta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $muralresposta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
