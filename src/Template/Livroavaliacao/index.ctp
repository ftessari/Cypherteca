<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroavaliacao[]|\Cake\Collection\CollectionInterface $livroavaliacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Livroavaliacao'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="livroavaliacao index large-9 medium-8 columns content">
    <h3><?= __('Livroavaliacao') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_livro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('positivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('negativo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livroavaliacao as $livroavaliacao): ?>
            <tr>
                <td><?= $this->Number->format($livroavaliacao->id) ?></td>
                <td><?= $this->Number->format($livroavaliacao->id_livro) ?></td>
                <td><?= $this->Number->format($livroavaliacao->id_user) ?></td>
                <td><?= $this->Number->format($livroavaliacao->positivo) ?></td>
                <td><?= $this->Number->format($livroavaliacao->negativo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $livroavaliacao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $livroavaliacao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $livroavaliacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroavaliacao->id)]) ?>
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
