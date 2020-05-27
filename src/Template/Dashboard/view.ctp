<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard $dashboard
 */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-danger">
                Solicitação
            </a>
        </li>
        <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : ?>
            <li>
                <a  href="<?= $this->Url->build(['controller' => 'Dashtipos', 'action' => 'index']) ?>" class="btn btn-danger">
                    Dashboard (Tipos)
                </a>
            </li>
        <?php endif; ?>
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
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn btn-danger">
                Séries
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn btn-danger">
                Editoras
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn btn-danger">
                Autores
            </a>
        </li>
        <hr>
    </ul>
</nav>
<div class="dashboard view large-9 medium-8 columns content">
    <h4><?= h($dashboard->dashtipo->tipo) ?></h4>
    <div class="row">
        <div class="col-12">
            <?php
            if ($dashboard->solicitacao == 0) { // Denuncia Usuario
                echo "Denúncia de <a href=". $this->Url->build(
                        [
                            'controller' => 'Usuarios',
                            'action' => 'view', $dashboard->alvo
                        ]
                    ) .">
						Usuário
					</a><br>";
            }
            elseif ($dashboard->solicitacao == 1) { // Comunicado
                echo $dashboard->descricao;
            }
            elseif ($dashboard->solicitacao == 2) { // Link quebrado
                echo "Visite este <a href=". $this->Url->build(
                        [
                            'controller' => 'Livros',
                            'action' => 'view', $dashboard->alvo
                        ]
                    ) .">
						Link
					</a><br>".$dashboard->descricao.$dashboard->idlink."<br>";
            }

            ?>
        </div>
    </div>
    <?php if ($dashboard->resposta) : ?>
    <div class="row">
        <h4><?= __('Resposta') ?></h4>
        <div class="col-12">
            <?= $this->Text->autoParagraph(h($dashboard->resposta)); ?>
        </div>
    </div>
    <?php endif; ?>
    <hr>
    <table class="vertical-table">
        <tr>
            <th scope="row"></th>
            <td class="actions">
            <?php
                if (empty($dashboard->dataconclusao)) :
                    if ($this->request->getSession()->read('Auth.User.tipo') > 1) {
                        $labelEdit = 'Resp.';
                        $titleEdit = 'Concluir com resposta';
                    }
                    elseif ($this->request->getSession()->read('Auth.User.tipo') == 1) {
                        $labelEdit = 'Editar';
                        $titleEdit = '';
                    }
                ?>
                     <a href="<?= $this->Url->build(
                         ['action' => 'edit', $dashboard->id],
                         ['title' => $titleEdit]
                         ) ?>" class="btn btn-primary">
                             <?php echo $labelEdit; ?>
                     </a>
            </td>
            <?php
                endif;
            ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dashboard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enviado por:') ?></th>
            <td>
				<a href=<?= $this->Url->build(['controller' => 'Usuarios', 'action' => 'view', $dashboard->iduser]) ?>>
						<?= h($dashboard->usuario->nome) ?>
				</a>
			</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td>
				<?php 
				if ($this->Number->format($dashboard->status) == 0) { 
					$status = 'Desativado';
				} else {
					$status = 'Ativo';
				}
				
				echo $status;
				?>
			</td>
        </tr>
     <!--  <tr>
            <th scope="row"><?= __('Moderador') ?></th>
            <td></td>
            <td><?= $this->Number->format($dashboard->moderador) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Informado em:') ?></th>
            <td><?= h($dashboard->datainfo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data de conclusão:') ?></th>
            <td><?= h($dashboard->dataconclusao) ?></td>
        </tr>
    </table>
</div>