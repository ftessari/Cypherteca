<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Minha Conta'), ['controller' => 'Usuarios', 'action' => 'edit'.DS.$this->request->getSession()->read('Auth.User.id')]) ?></li>
        <li><?= $this->Html->link(__('e-Mail'), ['controller' => 'Mail', 'action' => 'index']) ?></li>
        <li class="heading"><?= __('Livros') ?></li>

        <li class="heading"><?= __('Usuários') ?></li>
        <li><?= $this->Html->link(__('Novo Usuário'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Tabela de Pontos'), ['controller' => 'Pontos', 'action' => 'edit'.DS.'1']) ?></li>
        <li><?= $this->Html->link(__('Tipos de Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Títulos de Usuários'), ['controller' => 'Titulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Rank de Usuários'), ['controller' => 'Rank', 'action' => 'index']) ?></li>

        <li class="heading"><?= __('Admin.') ?></li>
        <li><?= $this->Html->link(__('Tipos de Usuários'), ['controller' => 'Tipos', 'action' => 'index']) ?></li>
    </ul>
</nav> -->
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
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Usuários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width="150"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col" width="120"><?= $this->Paginator->sort('Login') ?></th>
                <th scope="col" width="130"><?= $this->Paginator->sort('Tipo') ?></th>
                <th scope="col" width="180"><?= $this->Paginator->sort('e-Mail') ?></th>
                <th scope="col" width="70"><?= __('Ativação') ?></th>
                <th scope="col" width="170" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td>
                    <a href=<?= $this->Url->build(['action' => 'view', $usuario->id]) ?>>
                        <?= h($usuario->id) ?>
                    </a>
                </td>
                <td>
                    <a href=<?= $this->Url->build(['action' => 'view', $usuario->id]) ?>>
                        <?= h($usuario->nome) ?>
                    </a>
                </td>
                <td>
                    <a href=<?= $this->Url->build(['action' => 'view', $usuario->id]) ?>>
                        <?= h($usuario->login) ?>
                    </a>
                </td>
				<td><?= h($usuario->utipo->tipouser) ?></td> <!-- Tabela->campo -->
                <td><?= h($usuario->email) ?></td>
				
				<!-- Ativação -->
				<?php 
				if (!empty($this->request->getSession()->read('Auth.User.id'))):
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) {  // Controle - somente Admin
						if ($usuario->idstatus == 1) { // Se estiver ativo
							$legenda = "Bloquear"; 									
							$ativar = 4; // Bloqueado
							$cor_btn = 'btn';
							$icone = 'toggle_on';
						} 
						else {
							$legenda = "Ativar"; 
							$ativar = 1; // Ativar
							$cor_btn = 'btn';
							$icone = 'toggle_off';
						}							
				?>
				<td class="actions">
					<i class='material-icons md-24 align-middle'>
						<?= $this->Form->postLink(__($icone),
                            ['action' => 'ativa', $usuario->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $usuario->nome),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				<?php } 
				endif; ?>
				</td>
				<!-- Ativação - fim -->
				<td class="actions">	
				<i class='material-icons md-24 align-middle'>
                    <a title="Editar" href="<?= $this->Url->build(
                        [
                            'action' => 'edit', $usuario->id
                        ]
                    ) ?>" class="btn">
                        edit
                    </a>
				</i>
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
