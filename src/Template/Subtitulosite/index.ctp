<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subtitulosite[]|\Cake\Collection\CollectionInterface $subtitulosite
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
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroidioma', 'action' => 'index']) ?>" class="btn btn-danger">
                Idiomas
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livrotipos', 'action' => 'index']) ?>" class="btn btn-danger">
                Tipos
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroformatos', 'action' => 'index']) ?>" class="btn btn-danger">
                Formatos
            </a>
        </li>
    </ul>
</nav>
<div class="subtitulosite index large-9 medium-8 columns content">
    <h3><?= __('Sub-títulos para o site') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('frase') ?></th>
                <th scope="col" width="200" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subtitulosite as $subtitulosite): ?>
            <tr>
                <td><?= $this->Number->format($subtitulosite->id) ?></td>
                <td><?= h($subtitulosite->frase) ?></td>
                <td class="actions">
					<a href="<?= $this->Url->build(
						[
							'action' => 'edit', $subtitulosite->id
						]
						) ?>" class="btn btnW btn-primary">
							Editar
					</a>					
					<?= $this->Form->postLink(__('Deletar'), 
					[
						'action' 	=> 'delete', $subtitulosite->id						
					], 
					[
						'confirm'	=> __('Deseja deletar a frase # {0}?', $subtitulosite->id),
						'class'		=> "btn btnW btn-danger"])
					?>
					
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
