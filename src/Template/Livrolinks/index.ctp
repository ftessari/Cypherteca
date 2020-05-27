<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrolink[]|\Cake\Collection\CollectionInterface $livrolinks
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
<div class="livrolinks index large-9 medium-8 columns content">
    <h3><?= __('Lista de Uploads') ?></h3>
	<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width="100"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col" width="180"><?= $this->Paginator->sort('Livro') ?></th>
                <th scope="col" width="180"><?= $this->Paginator->sort('Enviado por') ?></th>
                <th scope="col" width="100"><?= $this->Paginator->sort('Envio') ?></th>
                <th scope="col" width="100"><?= $this->Paginator->sort('Downloads') ?></th>
				<th scope="col">Ativação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livrolinks as $livrolink): ?>
            <tr>
                <td><?= $this->Number->format($livrolink->id) ?></td>
                <td>
				<?php
					$label = 'Download';
						if ($livrolink->partes > 0) {$label = 'Parte '.$this->Number->format($livrolink->partes);}
											
					echo $this->Html->link($label, 'http://'.$livrolink->link, 
									[
										'class' => 'btn btn-warning btn-sm btn-block',
										'target' => '_blank'
										]
									); 
				?>
				</td>
                <td>
					<a href="<?= $this->Url->build(
                        [
                             'controller' => 'Livros',
                            'action' => 'view', $livrolink->livro->id
                        ]
                    ) ?>">
					<?= h($livrolink->livro->titulo) ?>
                    </a>
				</td>
                <td>
					<a href="<?= $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $livrolink->usuario->id
                        ]
                    ) ?>">
					<?= h($livrolink->usuario->nome) ?>
                    </a>
				</td>
                <td>
				<?php
                    $dataenvio = date("d/m/Y H:i:s", strtotime($livrolink->dataenvio));
                    echo $dataenvio;
                ?>
				</td>
                <td><?= $this->Number->format($livrolink->n_downloads) ?></td>    
				
				<!-- Ativação -->
				<?php 
				if (!empty($this->request->getSession()->read('Auth.User.id'))):
					if ($this->request->getSession()->read('Auth.User.tipo') > 0) {  // Controle - somente Admin
						if ($livrolink->ativo == 1) { // Se estiver ativo
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
                            ['action' => 'ativa', $livrolink->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $livrolink->id),
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
