<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto[]|\Cake\Collection\CollectionInterface $pontos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ponto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pontos index large-9 medium-8 columns content">
    <h3><?= __('Pontos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_bio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('livro_link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stitulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('n_paginas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datapub') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edicao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('editora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idioma') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tags') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descri') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avalia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comentar') ?></th>
                <th scope="col"><?= $this->Paginator->sort('digitalizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('autoral') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rastreio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('revisao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('traducao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agraecimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desgosto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('palavra_proibida') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pontos as $ponto): ?>
            <tr>
                <td><?= $this->Number->format($ponto->id) ?></td>
                <td><?= $this->Number->format($ponto->user_bio) ?></td>
                <td><?= $this->Number->format($ponto->livro_link) ?></td>
                <td><?= $this->Number->format($ponto->stitulo) ?></td>
                <td><?= $this->Number->format($ponto->capa) ?></td>
                <td><?= $this->Number->format($ponto->autor) ?></td>
                <td><?= $this->Number->format($ponto->n_paginas) ?></td>
                <td><?= $this->Number->format($ponto->categoria) ?></td>
                <td><?= $this->Number->format($ponto->datapub) ?></td>
                <td><?= $this->Number->format($ponto->edicao) ?></td>
                <td><?= $this->Number->format($ponto->editora) ?></td>
                <td><?= $this->Number->format($ponto->idioma) ?></td>
                <td><?= $this->Number->format($ponto->isbn) ?></td>
                <td><?= $this->Number->format($ponto->serie) ?></td>
                <td><?= $this->Number->format($ponto->tags) ?></td>
                <td><?= $this->Number->format($ponto->descri) ?></td>
                <td><?= $this->Number->format($ponto->avalia) ?></td>
                <td><?= $this->Number->format($ponto->comentar) ?></td>
                <td><?= $this->Number->format($ponto->digitalizacao) ?></td>
                <td><?= $this->Number->format($ponto->autoral) ?></td>
                <td><?= $this->Number->format($ponto->rastreio) ?></td>
                <td><?= $this->Number->format($ponto->revisao) ?></td>
                <td><?= $this->Number->format($ponto->traducao) ?></td>
                <td><?= $this->Number->format($ponto->agraecimento) ?></td>
                <td><?= $this->Number->format($ponto->desgosto) ?></td>
                <td><?= $this->Number->format($ponto->palavra_proibida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ponto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ponto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ponto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ponto->id)]) ?>
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
