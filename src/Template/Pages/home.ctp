<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro[]|\Cake\Collection\CollectionInterface $livros
 */
use Cake\ORM\TableRegistry;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
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
        <hr>
        <?php endif; ?>

        <li class="heading"><img href=<?= $this->Html->image("system/icons8-book-stack-26.png") ?>
                        <?= __('Categorias') ?></li>
        <?php foreach ($qcategoria as $listar):?>
            <a href=<?= $this->Url->build(['controller' => 'Livros', 
											'action' => 'index?busca='.$listar->categoria]) ?>>
                <?php echo $listar->categoria;?>
            </a><br>
        <?php endforeach;?>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <!-- Definição e rota para index -->
    <form style="text-align: right" action='<?php echo $this->Url->build(['controller' => 'Livros',
	'action' => 'index'])?>' class='form-header'>
        <input class='au-input au-input--xl' type='text' id='busca' name='busca' placeholder='Pesquisar'>
        <button type='submit' class='btn btnW btn-primary'>Buscar</button>
    </form>
	
    <div class="row">
	<!-- Mural-->	
		<div class="col-12" style="margin: 12px">
			<div class='row' style='display: flex'>
				<div class="col-12">
					<h3><?= __(' Mural de Recados') ?></h3>
				</div>
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col" width="30%">
								<?= $this->Paginator->sort('Menssagem') ?>
							</th>
							<th scope="col" width="20%" class="d-none d-sm-table-cell d-md-table-cell">
								<?= $this->Paginator->sort('Status') ?>
							</th>
							<th scope="col" width="20%" class="d-none d-sm-table-cell">							
								<?= $this->Paginator->sort('Usuário') ?>
							</th>
							<th scope="col" width="20%" class="d-none d-sm-table-cell d-md-table-cell"> 
								<?= $this->Paginator->sort('Data') ?>
							</th>
							<?php
								if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
									echo "<th scope='col' width='20%'>". __('Opções') ."</th>";
								}
							?>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($qMural as $mural):
			
						// Os desativados estão visiveis somente aos admins
						if (($mural->ativo == 1) || (
								($mural->ativo == 0) AND
								($this->request->getSession()->read('Auth.User.tipo') > 1)
							)) {
						?>
						<tr>
							<td>
								<a href=<?= $this->Url->build(['controller' => 'Mural', 'action' => 'view', $mural->id]) ?>>
									<?= h($mural->titulo) ?>
								</a>
							</td>
							<td class="d-none d-sm-table-cell d-md-table-cell">
								<span style="color: <?= '#'.$mural->muraltipo->cor ?>">
									<?= h($mural->muraltipo->tipo) ?>
								</span>
							</td>
							<td class="d-none d-sm-table-cell">
								<?= $this->Html->link(__(h($mural->usuario->nome)),
									['controller' => 'Usuarios', 'action' => 'view', $mural->iduser]) ?>
							</td>
							<td class="d-none d-sm-table-cell d-md-table-cell">
                                <?php
                                if ($mural->dataenvio === null) {
                                    $dataenvio = '';
                                } else {
                                    $dataenvio = $mural->dataenvio->format('d/m/Y');
                                }

                                echo $dataenvio;
                                ?>
							</td>
							<td class="actions">
								<?php if ($this->request->getSession()->read('Auth.User.id') == $mural->iduser) { ?>
									<i class='material-icons md-24 align-middle'>
									<a title="Editar" href="<?= $this->Url->build(
										[
										//	'controller' => 'Mural',
											'action' => 'edit', $mural->id
										]
										) ?>" class="btn btnW btn-primary">
											edit
									</a>
									</i>
								<?php } ?>
			
								<!-- Ativação -->
								<?php
								if ($this->request->getSession()->read('Auth.User.tipo') > 0) {  // Controle - somente Admin
									if ($mural->ativo == 1) { // Se estiver ativo
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
									<i class='material-icons md-24 align-middle'>
										<?= $this->Form->postLink(__($icone),
											['action' => 'ativa', $mural->id, $ativar],
											[
												'type' 		=> 'button',
												'class' 	=> $cor_btn,
												'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $mural->nome),
												'title' 	=> $legenda
											]
										);
										?>
									</i>
								<?php } ?>
								<!-- Ativação - fim -->
							</td>
						</tr>
						<?php } ?>
						<?php endforeach; ?>
					</tbody>
				</table>
                <div style="text-align: right" class="col-12">
                <a href="<?= $this->Url->build(
                            ['controller' => 'Mural', 'action' => 'add']
                        )?>" class='btn btnW btn-primary'>
                    Nova Mensagem
                </a></div>
			</div>
		</div>
		<!-- Fim do Mural -->
		
		<!-- Mais rescentes -->	
		<div class="col-12" style="margin: 12px">
			<div class='row' style='display: flex'>
				<div class="col-12">
					<h3><?= __('Novidades') ?></h3>
				</div>	
				<?php foreach ($qlivros as $livro): ?> 
				<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 zoom bloco-vitrine">
					<a href=<?= $this->Url->build(['controller' => 'Livros', 
												   'action' => 'view', $livro->id]) ?>>
						<?php if (!$livro->capa) {
							echo $this->Html->image("capas/default.png");
						}
						else {
							echo $this->Html->image("capas/".$livro->capa);
						}
						?>
					</a><br>   
					<center>
						<?= h($livro->titulo) ?><br>
						<?= h($livro->subtitulo) ?>
					</center>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- Fim do Mais rescentes -->		

        <!-- Autores Indie -->
        <?php if (!empty($qlivrosIndie)) : ?>
        <div class="col-12" style="margin: 12px">
            <div class='row' style='display: flex'>
                <div class="col-12">
                    <h3><?= __(' Autores Indie') ?></h3>
                </div>
                <?php foreach ($qlivrosIndie as $livroIndie): ?>
                    <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 zoom bloco-vitrine">
                        <a href=<?= $this->Url->build(['controller' => 'Livros',
                                                       'action' => 'view', $livroIndie->id]) ?>>
                            <?php
							if ($livroIndie->id) {
                                if (!$livroIndie->capa) {
                                    echo $this->Html->image("capas/default.png");
                                }
                                else {
                                    echo $this->Html->image("capas/".$livroIndie->capa);
                                }
							}
                            ?>
                        </a>
                        <br>
                        <center>
                            <?= h($livroIndie->titulo) ?><br>
                            <?= h($livroIndie->subtitulo) ?>
                        </center>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <!-- Fim do Autores Indie -->

        <!-- Mais Lidos -->
        <?php if (!empty($qlivrosMaisLidos)) : ?>
            <div class="col-12" style="margin: 12px">
                <div class='row' style='display: flex'>
                    <div class="col-12">
                        <h3><?= __(' + Lidos') ?></h3>
                    </div>
                    <?php foreach ($qlivrosMaisLidos as $livrosMLs): ?>
                        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 zoom bloco-vitrine">
                            <a href=<?= $this->Url->build(['controller' => 'Livros',
                                'action' => 'view', $livrosMLs->id]) ?>>
                                <?php
								if ($livrosMLs->id) :
								 if (!$livrosMLs->capa) {
                                    echo $this->Html->image("capas/default.png");
                                }
                                else {
                                    echo $this->Html->image("capas/".$livrosMLs->capa);
                                }
								endif;
                                ?>
                            </a>
                            <br>
                            <center>
                                <?= h($livrosMLs->titulo) ?><br>
                                <?= h($livrosMLs->subtitulo) ?>
                            </center>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- Fim do Mais Lidos -->


	</div>
</div>
