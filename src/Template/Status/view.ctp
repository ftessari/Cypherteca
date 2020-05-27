<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="status view large-9 medium-8 columns content">
    <h3><?= h($status->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nomeclatura') ?></th>
            <td><?= h($status->nomeclatura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($status->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Usuarios') ?></h4>
        <?php if (!empty($status->usuarios)): ?>
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
            <?php foreach ($status->usuarios as $usuarios): ?>
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
