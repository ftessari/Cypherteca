<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
 */
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Rank') ?></h3>
   <!-- <form style="text-align: right" action='<?php echo $this->Url->build(['Controller' => 'Usuarios', 'action' => 'rank', $tipo])?>' class='form-header'>
        <input class='au-input au-input--xl' type='text' id='busca' name='busca' placeholder='Pesquisar por associado'>
    <button type='submit' class='btn btnW btn-primary'>Buscar</button>
    </form> -->
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="60"><?= $this->Paginator->sort('Rank') ?></th>
                <th scope="col" width="150"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col" width="130"><?= $this->Paginator->sort('Tipo') ?></th>
			    <!--<th scope="col" width="150"><?= $this->Paginator->sort('Títulos') ?></th>-->

                <?php if ($tipo == 'pontos') : ?>
                    <th scope="col" width="80"><?= $this->Paginator->sort('Pontos') ?></th>
                <?php endif; ?>
                <?php if ($tipo == 'heart') : ?>
                    <th scope="col" width="80"><?= $this->Paginator->sort('Likes') ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $rank = 1;

            foreach ($usuarios as $usuario):
                if ($tipo == 'pontos') {
                    if ($usuario->pontos > 0) {
                        $libera = 'ok';
                    }
                    else {$libera = 'N';}
                }
                elseif ($tipo == 'heart') {
                    if ($usuario->heart > 0) {
                        $libera = 'ok';
                    } else {$libera = 'N';}
                }

                if ($libera == 'ok') {
            ?>
            <tr>
                <td>
                    <?= $rank++ .'º'?>
                </td>
                <td>
                    <a href=<?= $this->Url->build(['action' => 'view', $usuario->id]) ?>>
                        <?= h($usuario->nome) ?>
                    </a>
                </td>
				<td><?= h($usuario->utipo->tipouser) ?></td> <!-- Tabela->campo -->
				<!--<td><?= h($usuario->titulos) ?></td> -->
                <?php if ($tipo == 'pontos') : ?>
                <td><?= h($usuario->pontos) ?>
                </td>
                <?php endif; ?>
                <?php if ($tipo == 'heart') : ?>
				<td>
					<?php 
						if ($usuario->heart > 1) {
							$cor = '#dc143c';
						} elseif ($usuario->heart == 1) {
							$cor = '#848484';
							$usuario->heart = 1;
						}

                        echo h($usuario->heart);
					?>&nbsp;<i style='width: 60px; font-size:18px; color:<?= $cor ?> !important;' class='material-icons md-24 align-middle'>favorite</i>
				</td>
                <?php endif; ?>
            </tr>
            <?php } endforeach; ?>
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
