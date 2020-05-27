<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrocomentario $livrocomentario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livrocomentario'), ['action' => 'edit', $livrocomentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livrocomentario'), ['action' => 'delete', $livrocomentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livrocomentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livrocomentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livrocomentario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livrocomentarios view large-9 medium-8 columns content">
    <h3><?= h($livrocomentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livrocomentario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($livrocomentario->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Livro') ?></th>
            <td><?= $this->Number->format($livrocomentario->id_livro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($livrocomentario->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moderador') ?></th>
            <td><?= $this->Number->format($livrocomentario->moderador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Pub') ?></th>
            <td><?= h($livrocomentario->data_pub) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alt') ?></th>
            <td><?= h($livrocomentario->data_alt) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($livrocomentario->texto)); ?>
    </div>
</div>
