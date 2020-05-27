<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Titulo[]|\Cake\Collection\CollectionInterface $titulos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-danger">
                Incluir
            </a>
        </li>
        <hr>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn btn-danger">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn btn-danger">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn btn-danger">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn btn-danger">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn btn-danger">
                Autores
            </a>
        </li>
        <hr> </ul>
</nav>
<div class="titulos index large-9 medium-8 columns content">
    <h3><?= __('Títulos para Usuários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width="50"><?= $this->Paginator->sort('Icone') ?></th>
                <th scope="col" width="130"><?= $this->Paginator->sort('Designação') ?></th>
                <th scope="col" width="225"><?= $this->Paginator->sort('Descrição') ?></th>
                <th scope="col" width="225"><?= $this->Paginator->sort('Exigência') ?></th>
                <th scope="col" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titulos as $titulo): ?>
            <tr>
                <td><?= $this->Number->format($titulo->id) ?></td>
                <td height="60">
                    <?php
                    echo $this->Html->image("titulos/".$titulo->icone, [
                        "align" => "center"
                        //"title" => h($titulo->login)
                        //'url' => ['controller' => 'Recipes', 'action' => 'view', 6]
                    ]);
                    ?>
                </td>
                <td><?= h($titulo->designacao) ?></td>
                <td><?= h($titulo->descricao) ?></td>
                <td><?= h($titulo->exigencia) ?></td>
                <td class="actions">
                    <a href="<?= $this->Url->build(
                        [
                            'action' => 'edit', $titulo->id
                        ]
                    ) ?>" class="btn btnW btn-primary">
                        Editar
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) num total de {{count}}')]) ?></p>
    </div>
</div>
