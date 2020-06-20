<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mural $mural
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
		<li>
			<a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn">
			Index
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
<div class="mural form large-9 medium-8 columns content">
    <?= $this->Form->create($mural) ?>
    <fieldset>
        <h3>
            <a href='<?php echo $this->Url->build(['Controller' => 'index'])?>'>
                <?= __('Mural') ?>
            </a>
        </h3>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <?php
                            echo $this->Form->control('titulo',[
		                					'type' => 'text',
		                					'class' => 'form-control form-control-lg',
		                					'style' => 'width: 230px',
		                					'label' => [
		                						'text' 	=> 'Título',
		                						'class' => 'control-label input-label'
		                					]
		                				]);
                            echo $this->Form->control('texto',[
		                					'style' => 'width: 230px',
		                					'label' => [
		                						'text' 	=> 'Texto',
		                					]
		                				]);
                            echo $this->Form->control('iduser',[
		                					'value' => $this->request->getSession()->read('Auth.User.id'),
		                					'type' => 'hide'
		                				]);
                            echo $this->Form->control('ativo',[
                                            'value' => 1,
                                            'type' => 'hide'
                                        ]);
                            echo $this->Form->control('dataenvio', [
                                                     'type' => 'hide',
                                            'value' => date('Y-m-d H:s')
                                        ]);

                            echo "</div><div class='col-sm-12 col-md-6 col-lg-6 col-xl-6\'>".
                                $this->Form->control('idtipo',[
                                            'options' 	=> $parentTipos,
		                					'class' => 'form-control form-control-lg',
		                					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		                					'label' => [
		                						'text' 	=> 'Tipo',
		                						'class' => 'control-label input-label'
		                					]
		                				]);
                        ?>
                </div>
            </div>
        </div>
    </fieldset>
	<div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 150px',
                    'class' => 'btn',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
