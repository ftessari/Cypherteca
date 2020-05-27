<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroeditora[]|\Cake\Collection\CollectionInterface $livroeditoras
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
    </ul>
</nav>
<div class="livroeditoras index large-9 medium-8 columns content">
    <h3><?= __('Editoras') ?></h3>
	<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('editora') ?></th>
                <th scope="col"><?= __('link') ?></th>
                <th scope="col" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livroeditoras as $livroeditora): ?>
            <tr>
                <td>
                    <?= $this->Html->link(__( h($livroeditora->editora)),
                        ['controller' => 'Livros','action' => 'index', '?busca='.$livroeditora->editora]) ?>
                </td>
                <a href="<?= $this->Url->build($livroeditora->link) ?>">
                    <?= h($livroeditora->link) ?>
                </a>

                <td></td>
                <td class="actions">
                   <!-- Ativação -->
				<?php 
				if (!empty($this->request->getSession()->read('Auth.User.id'))):
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) {  // Controle - somente Admin
						if ($livroeditora->editavel == 1) { // Se estiver ativo
							$legenda = "Desativar edição"; 									
							$ativar = 0; // Desativar
							$cor_btn = 'btn btnW btn-secondary';
							$icone = 'toggle_on';
						} 
						else {
							$legenda = "Ativar edição"; 
							$ativar = 1; // Ativar
							$cor_btn = 'btn btnW btn-primary';
							$icone = 'toggle_off';
						}	
					?>
					<i class='material-icons md-24 align-middle'>
						<?= $this->Form->postLink(__($icone),
                            ['action' => 'ativa', $livroeditora->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' do registro de {0}?', $livroeditora->editora),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				<?php } 
				endif; ?>			
				
				<?php if (($livroeditora->editavel == 1) || ($this->request->getSession()->read('Auth.User.tipo') > 1)) { ?>
                    <i class='material-icons md-24 align-middle'>
					<a title="Editar" href="<?= $this->Url->build(
                        [
                            'action' => 'edit', $livroeditora->id
                        ]
                    ) ?>" class="btn btnW btn-primary">
                        edit
                    </a>
					</i>
				<?php } else {
					echo "<font style='color:#F00' title='Se desejar editar, entre em contato com a Curadoria.'>[edição desabilitada]</font>";
				} ?>
				</td>
				<!-- Ativação - fim -->
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
