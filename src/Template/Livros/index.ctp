<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro[]|\Cake\Collection\CollectionInterface $livros
 */
 use Cake\ORM\TableRegistry;
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
		<hr>
		
        <li class="heading"><?= __('Categorias') ?></li>
        <span>
            <?php foreach ($qcategoria as $listar):?>
            <a href=<?= $this->Url->build(['controller' => 'Livros', 
											'action' => 'index?busca='.$listar->categoria]) ?>>
                <?php echo $listar->categoria;?>
            </a><br>
        <?php endforeach;?>
        </span>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <h3><?= __('Livros') ?></h3>
    <!-- Definição e rota para index -->
	<form style="text-align: right" action='<?php echo $this->Url->build(['Controller' => 'Livros'])?>' class='form-header'>
		<input class='au-input au-input--xl' type='text' id='busca' name='busca' placeholder='Pesquisar'>
		<button type='submit' class='btn btnW btn-primary'>Buscar</button>
	</form>        
<div class="table-responsive-lg">
    <table class="table table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>                
                <th scope="col" width="100%"><?= $this->Paginator->sort('') ?></th>
				<th scope="col" width="120%"><?= $this->Paginator->sort('Título') ?></th>
				<th scope="col" width="100%"><?= $this->Paginator->sort('Categoria') ?></th>
                <th scope="col" width="90%" class="d-none d-sm-table-cell"><?= $this->Paginator->sort('Autor(a)') ?></th>
                <th scope="col" width="110%" class="actions">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
            <tr>
				<td height='50' class="zoom">
                    <a href=<?= $this->Url->build(['action' => 'view', $livro->id]) ?>>

						<?php if (!$livro->capa) {
                              echo $this->Html->image("capas/default.png");
                            }
                            else {
                              echo $this->Html->image("capas/".$livro->capa);
                            }
                        ?>
                        </a>
			    </td>
				<td>
					<a href=<?= $this->Url->build(['action' => 'view', $livro->id]) ?>>
						<?= h($livro->titulo) ?>
					</a><br>
                    <?= h($livro->subtitulo) ?>
				</td>
				<td>
					<a href=<?= '?busca='.$livro->livrocat->categoria ?>>
						<?= h($livro->livrocat->categoria) ?>
					</a>
                    <?php if ($livro->tags) :
                    echo "<br>";

                    $arr = explode('#', $livro->tags); // transforma a string em array.

                    for($i = 1; $i <  count($arr); $i++){
                        echo "<a href=".$this->Url->build(['controller' => 'Livros',
                                'action' => 'index?busca='.$arr[$i]
                            ]).">#".
                            $arr[$i]."</a>";
                    }
                    endif;
                    ?>
				</td>
                <td class="d-none d-sm-table-cell">
					<?php
					if ($livro->livroautor->id > 0) {
                     echo "<a href=" .$this->Url->build(
                        [
                            'controller' => 'Livroautor',
                            'action' => 'view', $livro->livroautor->id
                        ]
                    ). ">".
                        h($livro->livroautor->autor).
                    "</a>";
					}
					else {echo h($livro->livroautor->autor);} // Autor Indefinido
					?>
                </td>
                <td class="actions">
                  <!-- Ativação -->
				<?php 
				if (!empty($this->request->getSession()->read('Auth.User.id'))):
					if ($this->request->getSession()->read('Auth.User.tipo') > 1) {  // Controle - somente Admin
						if ($livro->editavel == 1) { // Se estiver ativo
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
                            ['action' => 'ativa', $livro->id, $ativar],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' do registro de {0}?', $livro->titulo),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				<?php } 
				endif; ?>			
				
				<?php if (($livro->editavel == 1) || ($this->request->getSession()->read('Auth.User.tipo') > 1)) { ?>
                    <i class='material-icons md-24 align-middle'>
					<a title="Editar" href="<?= $this->Url->build(
                        [
                            'action' => 'edit', $livro->id
                        ]
                    ) ?>" class='btn btnW btn-primary'>
                        edit
                    </a>
					</i>
				<?php
				}
				else {
					echo "<font style='color:#F00' title='Se desejar editar, entre em contato com a Curadoria.'>[edição desabilitada]</font>";
				}
				if ($this->request->getSession()->read('Auth.User.tipo') > 1) {
				  echo "<i class='material-icons md-24 align-middle'>".
					 $this->Form->postLink(__('delete_forever'),
                            [   'action' => 'delete', $livro->id],
							[
								'type' 		=> 'button',
								'class' 	=> 'btn btnW btn-danger',
                                'confirm' 	=> __('Deseja realmente remover a obra {0}?', $livro->titulo),
                                'title' 	=> 'Remover'
							]
							).
                      "</i>";
                }
				?>

				</td>
				<!-- Ativação - fim -->
				</td>
            </tr>
			
            <?php endforeach; ?>
        </tbody>
    </table>
	</div>
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
