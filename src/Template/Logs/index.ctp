<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log[]|\Cake\Collection\CollectionInterface $logs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logs index large-9 medium-8 columns content">
    <h3><?= __('Logs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quando') ?></th>
                <th scope="col"><?= $this->Paginator->sort('onde') ?></th>
                <th scope="col"><?= $this->Paginator->sort('o_que') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pontos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('argumento_extra') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $this->Number->format($log->id) ?></td>
                <td><?= $this->Number->format($log->quem) ?></td>
                <td><?= h($log->quando) ?></td>
                <td><?= $this->Number->format($log->onde) ?></td>
                <td><?= h($log->o_que) ?></td>
                <td><?= $this->Number->format($log->pontos) ?></td>
                <td><?= h($log->argumento_extra) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $log->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $log->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?>
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
