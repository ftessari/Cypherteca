<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mural $mural
 */

    if ($mural->ativo == 0) { // Mensagem desativada
        if ($this->request->getSession()->read('Auth.User.tipo') < 2) {
            return $this->redirect(['action' => 'index']);
        }
    }
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
            ) ?>" class="btn btn-danger">
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
            ) ?>" class="btn btn-danger">
                Minhas mensagens
            </a>
        </li>	
		
		<hr>	
		<li>
			<a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn btn-warning">
			Livros
			</a>
		</li>
		<li>
			<a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn btn-warning">
			Categorias
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn btn-warning">
			Séries
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn btn-warning">
			Editoras
			</a>
		</li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn btn-warning">
			Autores
			</a>
		</li>
		<hr>
    </ul>
</nav>
<div class="mural view large-9 medium-8 columns content">
    <h3>
        <a href='<?php echo $this->Url->build(['Controller' => 'Mural', 'action' => 'index'])?>'>
            <?= __('Mural') ?>
        </a>
    </h3>

    <h3 style="margin-top: 25px"><?= h($mural->titulo) ?></h3>
    <table class="vertical-table">
		<tr>
			<th scope="row"><?= __('') ?></th>
			<td>
			<a href=<?= $this->Url->build(['controller' => 'Usuarios', 'action' => 'view', $mural->iduser]) ?>>
                <div style="width: 150px" class="right">
				<?php
                if (!($mural->usuario->avatar)) {
                    echo $this->Html->image("users/default.png", [
                        "align" => "right"]);
                } else {
                    echo $this->Html->image("users/" . $mural->usuario->avatar, [
                        "align" => "right"]);
                }
                ?>
				</div>
			</a>
            </td>
		</tr>
        <tr>
            <th scope="row"><?= __('') ?></th>
            <td>
			<?= $this->Html->link(__(h($mural->usuario->nome)),
                    ['controller' => 'Usuarios', 'action' => 'view', $mural->iduser]) ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('') ?></th>
            <td>
                <span style="color: <?= '#'.$mural->muraltipo->cor ?>">
                    <?= h($mural->muraltipo->tipo) ?>
                </span>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('') ?></th>
            <td>
                <?php
                    $data = date("d/m/Y", strtotime($mural->dataenvio));
                    echo $data;
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('') ?></th>
            <td>
                <div style="text-align: right">
                <!-- Edição -->
                <?php if ($this->request->getSession()->read('Auth.User.id') == $mural->iduser) : ?>
                    <?= "<i class='material-icons md-24 align-middle'>".
					$this->Html->link(__('edit'),
                        [
                            'controller' => 'Mural',
                            'action' => 'edit', $mural->id,
                            'idMural' => $mural->id,
                            'titulo' => $mural->titulo,
                            'modera' => 0
                        ],
                        [
                            'class' => 'btn btnW btn-primary',
							'title' => 'Editar'
                        ]
                    ). "</i>" ?>
                <?php endif; ?>

                <!-- Moderação -->
                <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : ?>
                    <?= "<i class='material-icons md-24 align-middle'>".
					$this->Html->link(__('warning'),
                        [
                            'controller' => 'Mural',
                            'action' => 'edit', $mural->id,
                            'idMural' => $mural->id,
                            'titulo' => $mural->titulo,
                            'modera' => 1
                        ],
                        [
                            'class' => 'btn btnW btn-primary',
							'title' => 'Moderar'
                        ]
                    )."</i>" ?>

                    <!-- Ativação -->
                    <?php
                        // Controle - somente Admin
                        if ($mural->ativo == 1) { // Se estiver ativo
                            $legenda = "Desativar";
                            $ativar = 0;
                            $cor_btn = 'btn btnW btn-secondary';
                            $icone = 'toggle_on';
                        }
                        else {
                            $legenda = "Ativar";
                            $ativar = 1;
                            $cor_btn = 'btn btnW btn-primary';
                            $icone = 'toggle_off';
                        }
                    ?>
                    <?= "<i class='material-icons md-24 align-middle'>".
						$this->Html->link(__($icone),
                        ['controller' => 'Mural', 'action' => 'ativa', $mural->id, $ativar],
                        [
                            'class' 	=> $cor_btn,
                            'confirm' 	=> __('Deseja realmente '.$legenda.' o registro de {0}?', $mural->titulo),
                            'title' 	=> $legenda
                        ]
                    ). "</i>"
                    ?>
                <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-12 notice">
            <p>
                <?= $this->Text->autoParagraph($mural->texto); ?>
            </p>
        </div>
        <div style="text-align: right" class="col-12">
            <a href="<?= $this->Url->build(
                [
                    'controller' => 'Muralrespostas',
                    'action' => 'add',
                    'idMural' => $mural->id,
                    'titulo' => $mural->titulo
                ]
            ) ?>" class="btn btnW btn-danger">
                Responder
            </a>
        </div>
        <div class="col-12" style="margin-top: 5px; margin-bottom: 5px">
            <fieldset>
                <!-- Carrega todos as Respostas -->
                <?php foreach ($muralrespostas as $resposta) { ?>
                    <div class="notice">
                        <div class="row">
                            <!-- Pegar nome de Usuarios -->
                            <div class="col-6">
								<div class="row">
									<div class="col-2">
										<div style="width: 50px">
											<a href=<?= $this->Url->build(['controller' => 'Usuarios', 'action' => 'view', $resposta->usuario->id]) ?>>
											<?php
											if (!($resposta->usuario->avatar)) {
												echo $this->Html->image("users/default.png", [
													"align" => "right"]);
											} else {
												echo $this->Html->image("users/" . $resposta->usuario->avatar, [
													"align" => "right"]);
											}
											?>
											</a>
										</div>	
									</div>	
									<div class="col-10">	
										<?= $this->Html->link(__(h($resposta->usuario->nome)), ['controller' => 'Usuarios', 'action' => 'view', $resposta->iduser]) ?>
                                        <?php
                                            $dataresp = date("d/m/Y", strtotime($resposta->dataini));
                                            echo "<i><font color='#696969'>".$dataresp."</font></i>";
                                        ?><br>
										[Titulos]

									</div>
								</div>
						   </div>
                            <div class="col-6" style="text-align: right">
                                <?php if ($this->request->getSession()->read('Auth.User.id') == $mural->iduser) : ?>
                                    <?= "<i class='material-icons md-24 align-middle'>".
									$this->Html->link(__('edit'),
                                        [
                                            'controller' => 'Muralrespostas',
                                            'action' => 'edit', $resposta->id,
                                            'idMural' => $mural->id,
                                            'titulo' => $mural->titulo,
                                            'modera' => 0
                                        ],
                                        [
                                            'class' => 'btn btnW btn-primary',
											'title' => 'Editar'
                                        ]
                                    ) ?>
                                <?php endif; ?>
								
                                <!-- Edit Moderação -->
                                <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : ?>
                                    <?= "<i class='material-icons md-24 align-middle'>".
									$this->Html->link(__('warning'),
                                        [
                                            'controller' => 'Muralrespostas',
                                            'action' => 'edit', $resposta->id,
                                            'idMural' => $mural->id,
                                            'titulo' => $mural->titulo,
                                            'modera' => 1
                                        ],
                                        [
                                            'class' => 'btn btn-primary',
											'title' => 'Moderar'
                                        ]
                                    )."</i>" ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p><?= h($resposta->texto) ?></p>
                    </div>
                <?php } ?>
            </fieldset>
        </div>
    </div>
</div>
