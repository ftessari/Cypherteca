<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroavaliacao $livroavaliacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroavaliacao'), ['action' => 'edit', $livroavaliacao->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroavaliacao'), ['action' => 'delete', $livroavaliacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroavaliacao->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livroavaliacao'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroavaliacao'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livroavaliacao view large-9 medium-8 columns content">
    <h3><?= h($livroavaliacao->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroavaliacao->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Livro') ?></th>
            <td><?= $this->Number->format($livroavaliacao->id_livro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($livroavaliacao->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Positivo') ?></th>
            <td><?= $this->Number->format($livroavaliacao->positivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Negativo') ?></th>
            <td><?= $this->Number->format($livroavaliacao->negativo) ?></td>
        </tr>
    </table>
</div>
