<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosTitulo[]|\Cake\Collection\CollectionInterface $usuariosTitulos
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
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroidioma', 'action' => 'index']) ?>" class="btn">
			Idiomas
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livrotipos', 'action' => 'index']) ?>" class="btn">
			Tipos
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroformatos', 'action' => 'index']) ?>" class="btn">
			Formatos
			</a>
		</li>
    </ul>
</nav>
<div class="utitulos index large-9 medium-8 columns content">
    <h3><?= __('Títulos para usuários') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width='120'><?= $this->Paginator->sort('Usuário') ?></th>
                <th scope="col" width='110'><?= $this->Paginator->sort('Título') ?></th>
				<th scope="col" width='100'><?= $this->Paginator->sort(' ') ?></th>
                <th scope="col" width='100' class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utitulos as $utitulo): ?>
            <tr>
                <td>
                <?php
                    echo "				
				        <a href=". $this->Url->build(
                                [
                                    'controller' => 'Usuarios',
                                    'action' => 'view', $utitulo->id_user
                                ]
                            ).">". h($utitulo->usuario->nome) ."</a>
                        ";
				?>
				</td>
                <td>
				<?= $utitulo->titulo->designacao ?>
				<?= $this->Html->image("titulos/" . $utitulo->titulo->icone, [
                        "align" => "right"
						//"title" => $utitulo->titulo->designacao
						]);						
					?>
				</td>
				<td>
				</td>
                <td class="actions">
				
				<i class='material-icons md-24 align-middle'>
				<?php
					echo "<i class='material-icons md-24 align-middle'>".
					 $this->Form->postLink(__('delete_forever'),
                            [   'action' => 'delete', $utitulo->id_user],
							[
								'type' 		=> 'button',
								'class' 	=> 'btn',
                                'confirm' 	=> __('Deseja realmente removero este título: {0}?', $utitulo->id_titulo),
                                'title' 	=> 'Remover'
							]
							).
                      "</i>";				
				 ?>
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
