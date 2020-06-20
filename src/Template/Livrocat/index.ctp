<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrocat[]|\Cake\Collection\CollectionInterface $livrocat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn">
                Incluir
            </a>
        </li>
        <hr>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn">
                Autores
            </a>
        </li>   
    </ul>
</nav>
<div class="livrocat index large-9 medium-8 columns content">
    <h3><?= __('Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($qlivrocat as $livrocat): ?>
            <tr>
                <td>
                    <?= $this->Html->link(__( h($livrocat->categoria)),
                        ['controller' => 'Livros','action' => 'index', '?busca='.$livrocat->categoria]) ?>

                </td>
                <td class="actions">
                   <!-- Ativação -->
				<?php 
				if (!empty($this->request->getSession()->read('Auth.User.id'))):
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) {  // Controle - somente Admin
						if ($livrocat->editavel == 1) { // Se estiver ativo
							$legenda = "Desativar edição"; 									
							$ativar = 0; // Desativar
							$cor_btn = 'btn';
							$icone = 'toggle_on';
						} 
						else {
							$legenda = "Ativar edição"; 
							$ativar = 1; // Ativar
							$cor_btn = 'btn';
							$icone = 'toggle_off';
						}	
					?>
					<i class='material-icons md-24 align-middle'>
						<?= $this->Form->postLink(__($icone),
                            ['action' => 'ativa', $livrocat->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' do registro de {0}?', $livrocat->categoria),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				<?php } 
				endif; ?>			
				
				<?php if (($livrocat->editavel == 1) || 
				($this->request->getSession()->read('Auth.User.tipo') > 1)) { ?>
                    <i class='material-icons md-24 align-middle'>
					<a title="Editar" href="<?= $this->Url->build(
                        [
                            'action' => 'edit', $livrocat->id
                        ]
                    ) ?>" class="btn">
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
