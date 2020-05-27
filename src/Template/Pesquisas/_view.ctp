<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pesquisa $pesquisa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pesquisa'), ['action' => 'edit', $pesquisa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pesquisa'), ['action' => 'delete', $pesquisa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pesquisa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pesquisas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pesquisa'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pesquisas view large-9 medium-8 columns content">
    <h3><?= h($pesquisa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Termo') ?></th>
            <td><?= h($pesquisa->termo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pesquisa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($pesquisa->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datainfo') ?></th>
            <td><?= h($pesquisa->datainfo) ?></td>
        </tr>
    </table>
</div>
