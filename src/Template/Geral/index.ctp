<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Geral[]|\Cake\Collection\CollectionInterface $geral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Geral'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="geral index large-9 medium-8 columns content">
    <h3><?= __('Geral') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_padrao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_tamanho') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_max_x') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_max_y') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_min_x') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_capa_min_y') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_padrao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_tamanho') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_max_x') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_max_y') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_min_x') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avatar_min_y') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($geral as $geral): ?>
            <tr>
                <td><?= $this->Number->format($geral->id) ?></td>
                <td><?= h($geral->logo) ?></td>
                <td><?= h($geral->sub_titulo) ?></td>
                <td><?= h($geral->livro_capa_padrao) ?></td>
                <td><?= $this->Number->format($geral->livro_capa_tamanho) ?></td>
                <td><?= $this->Number->format($geral->livro_capa_max_x) ?></td>
                <td><?= $this->Number->format($geral->livro_capa_max_y) ?></td>
                <td><?= $this->Number->format($geral->livro_capa_min_x) ?></td>
                <td><?= $this->Number->format($geral->livro_capa_min_y) ?></td>
                <td><?= h($geral->avatar_padrao) ?></td>
                <td><?= $this->Number->format($geral->avatar_tamanho) ?></td>
                <td><?= $this->Number->format($geral->avatar_max_x) ?></td>
                <td><?= $this->Number->format($geral->avatar_max_y) ?></td>
                <td><?= $this->Number->format($geral->avatar_min_x) ?></td>
                <td><?= $this->Number->format($geral->avatar_min_y) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $geral->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $geral->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $geral->id], ['confirm' => __('Are you sure you want to delete # {0}?', $geral->id)]) ?>
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
