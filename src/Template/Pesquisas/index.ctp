<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pesquisa[]|\Cake\Collection\CollectionInterface $pesquisas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <form action='index' class='form-header'>
			<input class='au-input au-input--xl' type='text' id='busca' name='busca' placeholder='Pesquise por nome fantasia ou razão social'>
			<button type='submit' class='btn btn-primary'>Buscar</button>
		</form>
		<ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pesquisa'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pesquisas index large-9 medium-8 columns content">
    <h3><?= __('Pesquisas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
             <!--   
				<th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('Pesquisa') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Data') ?></th>
               <!-- <th scope="col" class="actions"><?= __('Actions') ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesquisas as $pesquisa): ?>
            <tr>
             <!--   <td><?= $this->Number->format($pesquisa->id) ?></td>
                <td><?= $this->Number->format($pesquisa->id_user) ?></td> -->
                <td><?= h($pesquisa->termo) ?></td>
                <td><?= h($pesquisa->datainfo) ?></td>
               <!-- <td class="actions">
                     <?= $this->Html->link(__('View'), ['action' => 'view', $pesquisa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pesquisa->id]) ?>
                   <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pesquisa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pesquisa->id)]) ?>
                </td>-->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
