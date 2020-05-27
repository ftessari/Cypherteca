<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrocomentario[]|\Cake\Collection\CollectionInterface $livrocomentarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
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
<div class="livrocomentarios index large-9 medium-8 columns content">
    <h3><?= __('Comentários dos Livros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="200"><?= $this->Paginator->sort('Mensagem') ?></th>
                <th scope="col" width="180"><?= $this->Paginator->sort('Usuário') ?></th>
                <th scope="col" width="180"><?= $this->Paginator->sort('Livro') ?></th>
                <th scope="col" width="90"><?= $this->Paginator->sort('Publicação') ?></th>
                <th scope="col" width="90"><?= $this->Paginator->sort('Alteração') ?></th>
                <th scope="col" width="100" class="actions"><?= __('Ativação') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livrocomentarios as $livrocomentario): ?>
            <tr>
                <td><?= h($livrocomentario->texto) ?></td>
                <td>
					<a href="<?= $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $livrocomentario->usuario->id
                        ]
                    ) ?>">
					<?= h($livrocomentario->usuario->nome) ?>
                    </a>
				</td>
                <td>
					<a href="<?= $this->Url->build(
                        [
                            'controller' => 'Livros',
                            'action' => 'view', $livrocomentario->livro->id
                        ]
                    ) ?>">
					<?= h($livrocomentario->livro->titulo) ?>
                    </a>
				</td>
                <td>
				<?php
                    $data_pub = date("d/m/Y H:i:s", strtotime($livrocomentario->data_pub));
                    echo $data_pub;
                ?>
				</td>
                <td>
				<?php
                    $data_alt = date("d/m/Y H:i:s", strtotime($livrocomentario->data_alt));
                    echo $data_alt;
                ?>
				</td>
                <!-- Ativação -->
				<?php 
				if (!empty($this->request->Session()->read('Auth.User.id'))): 
					if ($this->request->Session()->read('Auth.User.tipo') > 0) {  // Controle - somente Admin				
						if ($livrocomentario->ativo == 1) { // Se estiver ativo
							$legenda = "Desativar"; 									
							$ativar = 0; // Desativar
							$cor_btn = 'btn btnW btn-secondary';
							$icone = 'toggle_on';
						} 
						else {
							$legenda = "Ativar"; 
							$ativar = 1; // Ativar
							$cor_btn = 'btn btnW btn-primary';
							$icone = 'toggle_off';
						}							
				?>
				<td class="actions">
					<i class='material-icons md-24 align-middle'>
						<?= $this->Form->postLink(__($icone),
                            ['action' => 'ativa', $livrocomentario->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $livrocomentario->id),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				</td>
				<?php } 
				endif; ?>
				<!-- Ativação - fim -->
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
