<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mural[]|\Cake\Collection\CollectionInterface $mural
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(
                [
                    'controller' => 'Mural',
                    'action' => 'add'
                ]
            ) ?>" class="btn">
                Nova mensagem
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(
                [
                    'controller' => 'Mural',
                    'action' => 'index',
                    'iduser' => $this->request->getSession()->read('Auth.User.id')
                ]
            ) ?>" class="btn">
                Minhas mensagens
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
		<hr>
    </ul>
</nav>
<div class="mural index large-9 medium-8 columns content">
    <h3>
        <a href='<?php echo $this->Url->build(['Controller' => 'index'])?>'>
            <?= __('Mural de recados') ?>
        </a>
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="30%"><?= $this->Paginator->sort('Menssagem') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('Usuário') ?></th>
                <th scope="col" width="20%"><?= $this->Paginator->sort('Data') ?></th>
                <?php
                    if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
                        echo "<th scope='col'  width='20%'>". __('Opções') ."</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
             foreach ($qmural as $mural):

             // Os desativados estão visiveis somente aos admins
             if (($mural->ativo == 1) || (
                     ($mural->ativo == 0) AND
                     ($this->request->getSession()->read('Auth.User.tipo') > 1)
                 )) {
            ?>
            <tr>
                <td>
                    <a href=<?= $this->Url->build(['action' => 'view', $mural->id]) ?>>
                        <?= h($mural->titulo) ?>
                    </a>
                </td>
                <td>
                    <span style="color: <?= '#'.$mural->muraltipo->cor ?>">
                        <?= h($mural->muraltipo->tipo) ?>
                    </span>
                </td>
                <td>
                    <?= $this->Html->link(__(h($mural->usuario->nome)),
                        ['controller' => 'Usuarios', 'action' => 'view', $mural->iduser]) ?>
                </td>
                <td>
                    <?php
                        $data = date("d/m/Y", strtotime($mural->dataenvio));
                        echo $data;
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
				    		) ?>" class="btn">
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

                <!-- <td class="actions">
                    <?= $this->Html->link(__('[Ver]'), ['action' => 'view', $mural->id]) ?>
                    <?= $this->Html->link(__('[Editar]'), ['action' => 'edit', $mural->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mural->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mural->id)]) ?>
				</td> -->
            </tr>
            <?php } ?>
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
