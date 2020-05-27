<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto $ponto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ponto'), ['action' => 'edit', $ponto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ponto'), ['action' => 'delete', $ponto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ponto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pontos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ponto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pontos view large-9 medium-8 columns content">
    <h3><?= h($ponto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ponto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Bio') ?></th>
            <td><?= $this->Number->format($ponto->user_bio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Livro Link') ?></th>
            <td><?= $this->Number->format($ponto->livro_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stitulo') ?></th>
            <td><?= $this->Number->format($ponto->stitulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capa') ?></th>
            <td><?= $this->Number->format($ponto->capa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autor') ?></th>
            <td><?= $this->Number->format($ponto->autor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('N Paginas') ?></th>
            <td><?= $this->Number->format($ponto->n_paginas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $this->Number->format($ponto->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datapub') ?></th>
            <td><?= $this->Number->format($ponto->datapub) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edicao') ?></th>
            <td><?= $this->Number->format($ponto->edicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editora') ?></th>
            <td><?= $this->Number->format($ponto->editora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Idioma') ?></th>
            <td><?= $this->Number->format($ponto->idioma) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= $this->Number->format($ponto->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serie') ?></th>
            <td><?= $this->Number->format($ponto->serie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tags') ?></th>
            <td><?= $this->Number->format($ponto->tags) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descri') ?></th>
            <td><?= $this->Number->format($ponto->descri) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Avalia') ?></th>
            <td><?= $this->Number->format($ponto->avalia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comentar') ?></th>
            <td><?= $this->Number->format($ponto->comentar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Digitalizacao') ?></th>
            <td><?= $this->Number->format($ponto->digitalizacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Autoral') ?></th>
            <td><?= $this->Number->format($ponto->autoral) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rastreio') ?></th>
            <td><?= $this->Number->format($ponto->rastreio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Revisao') ?></th>
            <td><?= $this->Number->format($ponto->revisao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Traducao') ?></th>
            <td><?= $this->Number->format($ponto->traducao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agraecimento') ?></th>
            <td><?= $this->Number->format($ponto->agraecimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desgosto') ?></th>
            <td><?= $this->Number->format($ponto->desgosto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Palavra Proibida') ?></th>
            <td><?= $this->Number->format($ponto->palavra_proibida) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($ponto->usuarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Login') ?></th>
                <th scope="col"><?= __('Senha') ?></th>
                <th scope="col"><?= __('Datanasci') ?></th>
                <th scope="col"><?= __('Dataini') ?></th>
                <th scope="col"><?= __('Dataultimo') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Site') ?></th>
                <th scope="col"><?= __('Telegram') ?></th>
                <th scope="col"><?= __('Avatar') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Informe Admin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ponto->usuarios as $usuarios): ?>
            <tr>
                <td><?= h($usuarios->id) ?></td>
                <td><?= h($usuarios->nome) ?></td>
                <td><?= h($usuarios->login) ?></td>
                <td><?= h($usuarios->senha) ?></td>
                <td><?= h($usuarios->datanasci) ?></td>
                <td><?= h($usuarios->dataini) ?></td>
                <td><?= h($usuarios->dataultimo) ?></td>
                <td><?= h($usuarios->tipo) ?></td>
                <td><?= h($usuarios->bio) ?></td>
                <td><?= h($usuarios->email) ?></td>
                <td><?= h($usuarios->site) ?></td>
                <td><?= h($usuarios->telegram) ?></td>
                <td><?= h($usuarios->avatar) ?></td>
                <td><?= h($usuarios->status) ?></td>
                <td><?= h($usuarios->informe_admin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Usuarios', 'action' => 'view', $usuarios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Usuarios', 'action' => 'edit', $usuarios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Usuarios', 'action' => 'delete', $usuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuarios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
