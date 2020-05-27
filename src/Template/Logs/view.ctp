<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Log'), ['action' => 'edit', $log->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Log'), ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logs view large-9 medium-8 columns content">
    <h3><?= h($log->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('O Que') ?></th>
            <td><?= h($log->o_que) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Argumento Extra') ?></th>
            <td><?= h($log->argumento_extra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($log->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quem') ?></th>
            <td><?= $this->Number->format($log->quem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Onde') ?></th>
            <td><?= $this->Number->format($log->onde) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pontos') ?></th>
            <td><?= $this->Number->format($log->pontos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quando') ?></th>
            <td><?= h($log->quando) ?></td>
        </tr>
    </table>
</div>
