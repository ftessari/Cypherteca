<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroponto[]|\Cake\Collection\CollectionInterface $livropontos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Livroponto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="livropontos index large-9 medium-8 columns content">
    <h3><?= __('Livropontos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idlivro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iduser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pontos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livropontos as $livroponto): ?>
            <tr>
                <td><?= $this->Number->format($livroponto->id) ?></td>
                <td><?= $this->Number->format($livroponto->idlivro) ?></td>
                <td><?= $this->Number->format($livroponto->iduser) ?></td>
                <td><?= $this->Number->format($livroponto->pontos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $livroponto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $livroponto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $livroponto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroponto->id)]) ?>
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
