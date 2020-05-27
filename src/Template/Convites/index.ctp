<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Convite[]|\Cake\Collection\CollectionInterface $convites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Convite'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="convites index large-9 medium-8 columns content">
    <h3><?= __('Convites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_ini') ?></th>
                <th scope="col"><?= $this->Paginator->sort('convite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($convites as $convite): ?>
            <tr>
                <td><?= $this->Number->format($convite->id) ?></td>
                <td><?= $this->Number->format($convite->id_user) ?></td>
                <td><?= h($convite->data_ini) ?></td>
                <td><?= h($convite->convite) ?></td>
                <td><?= h($convite->data_criacao) ?></td>
                <td><?= $this->Number->format($convite->usado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $convite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $convite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $convite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $convite->id)]) ?>
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
