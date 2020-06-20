<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard[]|\Cake\Collection\CollectionInterface $dashboard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn">
                Abrir Solicitação
            </a>			
        </li>
        
        <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : ?>
            <li>
                <a  href="<?= $this->Url->build(['controller' => 'Dashtipos', 'action' => 'index']) ?>" class="btn">
                    Tipos de Solicitações
                </a>
            </li>
        <?php endif; ?>
		 <hr>
		 
		<li>
		
		<a  href="<?= $this->Url->build(['action' => 'backup']) ?>" class="btn">
                Backup
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
<div class="dashboard index large-9 medium-8 columns content">
    <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) { ?>
        <h3><?= __('Dashboard') ?></h3>
    <?php } else { ?>
    <h3><?= __('Minhas Solicitações') ?></h3>
    <?php } ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" width="140"><?= $this->Paginator->sort('Solicitação') ?></th>
                <th scope="col" width="140"><?= $this->Paginator->sort('Enviado por:') ?></th>
                <th scope="col" width="130"><?= $this->Paginator->sort('Data') ?></th>
                <th scope="col" width="130"><?= $this->Paginator->sort('Conclusão') ?></th>
                <th scope="col" width="80" class="actions"><?= __('Opções') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dashboards as $dashboard): 
			
				// Adiconar cor
				if ($dashboard->solicitacao == 0) {
					$cor = '#FE2E2E';
				} elseif ($dashboard->solicitacao == 1) {
					$cor = '#2E64FE';
				} elseif ($dashboard->solicitacao == 2) {
					$cor = '#FF8000';
				}
			
			?>
            <tr>
                <td><?= $this->Number->format($dashboard->id) ?></td>
                <td>
					<a style=<?= 'color:'.$cor ?> href=<?= $this->Url->build(['action' => 'view', $dashboard->id]) ?>>
						<b><?= h($dashboard->dashtipo->tipo) ?></b>
					</a>				
				</td>
                <td>
					<a href=<?= $this->Url->build(['controller' => 'Usuarios', 'action' => 'view', $dashboard->iduser]) ?>>
						<?= h($dashboard->usuario->nome) ?>
					</a>
				</td>
                <td>
                    <?php
                    if ($dashboard->datainfo === null) {
                       $datainfo = '';
                    } else {
                        $datainfo = date("d/m/Y", strtotime($dashboard->datainfo));
                    }

                    echo $datainfo;
                    ?>
                </td>
                <td>
                    <?php
                    if ($dashboard->dataconclusao === null) {
                        $dataconclusao = '';
                    } else {
                        $dataconclusao = date("d/m/Y", strtotime($dashboard->dataconclusao));
                    }

                    echo $dataconclusao;
                    ?>
                </td>
                <td class="actions">
                    <?php
                    if (empty($dashboard->dataconclusao)) :
                        if ($this->request->getSession()->read('Auth.User.tipo') > 1) {
                            $labelEdit = 'Resp.';
                            $titleEdit = 'Concluir com resposta';
                        }
                        else {
                            $labelEdit = 'Editar';
                            $titleEdit = '';
                        }
                    ?>
					<a href="<?= $this->Url->build(
						    ['action' => 'edit', $dashboard->id],
                            ['title' => $titleEdit]
						) ?>" class="btn">
							<?php echo $labelEdit; ?>
					</a>
				<!-- Ativação -->
				<?php
                    endif;
				?>
				<!-- Ativação - fim -->

				<!-- Conclusão -->
				<?php 
				if ($this->request->getSession()->read('Auth.User.tipo') > 1) :  // Controle - somente Admin				
					if ($dashboard->dataconclusao == null) {
						$legenda = "Concluir"; 
						$cor_btn = 'btn';
				?>
				<td class="actions">
					<i class='material-icons md-24 align-middle'>
						<?= $this->Form->postLink(__('done'),
                            ['action' => 'conclusao', $dashboard->id],
							[																							
								'type' 		=> 'button',			
								'class' 	=> $cor_btn,
								'confirm' 	=> __('Deseja realmente '.$legenda.' a solicitação de {0}?', $dashboard->id),
								'title' 	=> $legenda
							]
							);
						?>
					</i>
				</td>
					<?php } endif; ?>
				<!-- Conclusçao - fim -->
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
