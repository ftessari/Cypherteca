<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visita[]|\Cake\Collection\CollectionInterface $visitas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Visita'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="visitas index large-9 medium-8 columns content">
    <h3><?= __('Visitas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_visita') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visitas') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitas as $visita): ?>
            <tr>
                <td><?= $this->Number->format($visita->ID) ?></td>
                <td><?= h($visita->page) ?></td>
                <td><?= h($visita->data_visita) ?></td>
                <td><?= $this->Number->format($visita->visitas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $visita->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visita->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visita->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $visita->ID)]) ?>
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
