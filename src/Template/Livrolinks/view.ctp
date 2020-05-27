<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrolink $livrolink
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livrolink'), ['action' => 'edit', $livrolink->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livrolink'), ['action' => 'delete', $livrolink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livrolink->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livrolinks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livrolink'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livrolinks view large-9 medium-8 columns content">
    <h3><?= h($livrolink->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($livrolink->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livrolink->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idformato') ?></th>
            <td><?= $this->Number->format($livrolink->idformato) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idlivro') ?></th>
            <td><?= $this->Number->format($livrolink->idlivro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iduser') ?></th>
            <td><?= $this->Number->format($livrolink->iduser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('N Downloads') ?></th>
            <td><?= $this->Number->format($livrolink->n_downloads) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dataenvio') ?></th>
            <td><?= h($livrolink->dataenvio) ?></td>
        </tr>
    </table>
</div>
