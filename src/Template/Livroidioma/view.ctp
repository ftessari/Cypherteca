<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroidioma $livroidioma
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Livroidioma'), ['action' => 'edit', $livroidioma->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Livroidioma'), ['action' => 'delete', $livroidioma->id], ['confirm' => __('Are you sure you want to delete # {0}?', $livroidioma->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Livroidioma'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Livroidioma'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="livroidioma view large-9 medium-8 columns content">
    <h3><?= h($livroidioma->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Idioma') ?></th>
            <td><?= h($livroidioma->idioma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($livroidioma->id) ?></td>
        </tr>
    </table>
</div>
