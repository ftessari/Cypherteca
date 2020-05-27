<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrocat $livrocat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livrocat'), ['action' => 'edit', $livrocat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livrocat'), ['action' => 'delete', $livrocat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livrocat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livrocat'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livrocat'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livrocat view large-9 medium-8 columns content">
    <h3><?= h($livrocat->categoria) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($livrocat->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livrocat->id) ?></td>
        </tr>
    </table>
</div>
