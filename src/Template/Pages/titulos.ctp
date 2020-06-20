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
        <hr>
        <?php endif; ?>

        <li class="heading"><?= __('Categorias') ?></li>
        <?php foreach ($qcategoria as $listar):?>
            <a href=<?= $this->Url->build(['controller' => 'Livros',
											'action' => 'index?busca='.$listar->categoria]) ?>>
                <?= $listar->categoria ?>
            </a><br>
        <?php endforeach;?>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <div class="row">
		<h3><?= __('Títulos') ?></h3>
        <div class="row">
            <div class="col-9">
                <div style="list-style: none;" class="notice">                    					
                    <table class="table table-sm table-light table-borderless vertical-table">
						<thead>
						<tr>
							<th scope="col" width="30"><?= h('Símbolo') ?></th>
							<th scope="col" width="70"><?= h('Descrição') ?></th>
							<th scope="col" width="70"><?= h('Requisitos') ?></th>					
						</tr>
						</thead>
                        <tbody>
						<?php	foreach ($qtitulos as $titulos): ?>
							<tr>
								<th>
									<?= $this->Html->image("titulos/".$titulos->icone, [
										"align" => "center" ]) ?>
								</th>
								<td style="text-align: left"><b><?= h($titulos->designacao) ?></b><br>
								<?= h($titulos->descricao) ?></td>	   
                                <td><?= h($titulos->exigencia) ?></td>
                            </tr>							
						<?php endforeach; ?>
                        </tbody>
					</table>	
                    <p style='text-align: right'>~ A Curadoria</p>
				
                </div>
            </div>
            <div class="col-3">
                <?= $this->Html->image("system/teca_l.png", [
                    "width" => "70px"
                ]) ?>
                <div class="notice" style="font-size: 12px">
                    Os títulos são atribuidos pela <b>Curadoria</b> mediante pedido do <b>associado</b> e preenchimentos dos requisitos.
                </div>
            </div>
        </div>
    </div>
</div>
