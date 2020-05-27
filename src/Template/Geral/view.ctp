<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Geral $geral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Geral'), ['action' => 'edit', $geral->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Geral'), ['action' => 'delete', $geral->id], ['confirm' => __('Are you sure you want to delete # {0}?', $geral->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Geral'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Geral'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="geral view large-9 medium-8 columns content">
    <h3><?= h($geral->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($geral->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Titulo') ?></th>
            <td><?= h($geral->sub_titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Padrao') ?></th>
            <td><?= h($geral->livro_capa_padrao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Padrao') ?></th>
            <td><?= h($geral->avatar_padrao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($geral->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Tamanho') ?></th>
            <td><?= $this->Number->format($geral->livro_capa_tamanho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Max X') ?></th>
            <td><?= $this->Number->format($geral->livro_capa_max_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Max Y') ?></th>
            <td><?= $this->Number->format($geral->livro_capa_max_y) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Min X') ?></th>
            <td><?= $this->Number->format($geral->livro_capa_min_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Capa Min Y') ?></th>
            <td><?= $this->Number->format($geral->livro_capa_min_y) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Tamanho') ?></th>
            <td><?= $this->Number->format($geral->avatar_tamanho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Max X') ?></th>
            <td><?= $this->Number->format($geral->avatar_max_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Max Y') ?></th>
            <td><?= $this->Number->format($geral->avatar_max_y) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Min X') ?></th>
            <td><?= $this->Number->format($geral->avatar_min_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avatar Min Y') ?></th>
            <td><?= $this->Number->format($geral->avatar_min_y) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Info Lateral') ?></h4>
        <?= $this->Text->autoParagraph(h($geral->info_lateral)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rodape') ?></h4>
        <?= $this->Text->autoParagraph(h($geral->rodape)); ?>
    </div>
</div>
