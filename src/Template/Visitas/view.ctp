<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Visita $visita
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Visita'), ['action' => 'edit', $visita->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Visita'), ['action' => 'delete', $visita->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $visita->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Visitas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visita'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="visitas view large-9 medium-8 columns content">
    <h3><?= h($visita->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Page') ?></th>
            <td><?= h($visita->page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($visita->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visitas') ?></th>
            <td><?= $this->Number->format($visita->visitas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Visita') ?></th>
            <td><?= h($visita->data_visita) ?></td>
        </tr>
    </table>
</div>
