<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muraltipo[]|\Cake\Collection\CollectionInterface $muraltipos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Muraltipo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="muraltipos index large-9 medium-8 columns content">
    <h3><?= __('Muraltipos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($muraltipos as $muraltipo): ?>
            <tr>
                <td><?= $this->Number->format($muraltipo->id) ?></td>
                <td><?= h($muraltipo->tipo) ?></td>
                <td class="actions">
                 <?= $this->Html->link(__('[Editar]'), ['action' => 'edit', $muraltipo->id]) ?>
                    
					<!--   <?= $this->Html->link(__('View'), ['action' => 'view', $muraltipo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $muraltipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $muraltipo->id)]) ?>
                --></td>
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
