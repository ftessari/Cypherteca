<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro $livro
 */
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
<div class="livros form large-9 medium-8 columns content">
    <?= $this->Form->create($livro, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Livro') ?></legend>
        <div class="container">
                <div class="row">
                    <div class="col-12 notice">
                        <ul style="padding-left: 5px; color: #985f0d">
                            <b>Atenção!</b>
                            <li><b>Uploads</b> de <i>links</i> devem ser especificados na
                                <a href=<?= $this->Url->build(['action' => 'view', $livro->id]) ?>>
                                    <b>página da obra</b>
                                </a>.
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12" style="text-align: left">
                        <?php echo $this->Html->image("system/teca_up.png", [
                            "width" => "70px"
                        ]);
                        ?>
                    </div>
                </div>
            <br>

			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
					<?php					
						echo $this->Form->control('upload[]',[
										'class' => 'form-control form-control-lg',
										'type' => 'file',
										//'multiple' => 'true', // Mais de um arquivo
										'style'     => 'margin-top: 5px; margin-botton: 15px; width: 230px',
										'label' => [
											'text' 	=> 'Capa',
											'class' => 'control-label input-label'
										]
									]);
						echo $this->Form->control('titulo', [
		            					'class' => 'form-control form-control-lg',
		            					'type' 	=> 'text',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' => [
		            						'text' 	=> 'Título',
		            						'class' => 'control-label input-label'
		            					]
		            				]);
                        echo $this->Form->control('subtitulo', [
		            					'class' => 'form-control form-control-lg',
		            					'type' 	=> 'text',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' => [
		            						'text' 	=> 'Sub Título',
		            						'class' => 'control-label input-label'
		            					]
		            				]);				
                        echo $this->Form->control('sinopse', [
										'type' => 'textarea',
										'style' => 'width: 230px'
									]);						
						echo $this->Form->control('ano', [
                                        'empty' => true,
                                        'type' => 'text',
                                        'placeholder' => '1XXX',
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
                                            'text' 		=> 'Publicação',
                                            'class' 	=> 'control-label input-label'
                                        ]
                                    ]);
                        echo $this->Form->control('ididioma', [
		            					'options' 	=> $parentIdiomas,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'Idioma',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
                        echo $this->Form->control('n_pag', [
		            					'class' => 'form-control form-control-lg',
		            					'type' 	=> 'text',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' => [
		            						'text' 	=> 'Nº de Páginas',
		            						'class' => 'control-label input-label'
		            					]
		            				]);
						echo $this->Form->control('ideditora', [
		            					'options' 	=> $parentEditoras,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'Editora',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
                    echo  "</div>
                            <div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>";
                        echo $this->Form->control('ISBN', [
		            					'class' => 'form-control form-control-lg',
		            					'type' 	=> 'text',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' => [
		            						'text' 	=> 'ISBN',
		            						'class' => 'control-label input-label'
		            					]
		            				]);
						echo $this->Form->control('idautor', 	[
		            					'options' 	=> $parentAutores,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'Autor',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
		            	echo $this->Form->control('idcategoria', [
		            							'options' 	=> $parentCategorias,
		            							'class' 	=> 'form-control form-control-lg',
		            							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            							'label' 	=> [
		            								'text' 		=> 'Categoria',
		            								'class' 	=> 'control-label input-label'
		            							]
		            						]
		            					);
                        echo $this->Form->control('idserie', [
		            							'options' 	=> $parentSeries,
		            							'class' 	=> 'form-control form-control-lg',
		            							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            							'label' 	=> [
		            								'text' 		=> 'Série',
		            								'class' 	=> 'control-label input-label'
		            							]
		            						]
		            					);										
		            	echo $this->Form->control('edicao', [
		            					'class' => 'form-control form-control-lg',
		            					'type' 	=> 'text',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'value' => '1',
		            					'label' => [
		            						'text' 	=> 'Edição',
		            						'class' => 'control-label input-label'
		            					]
		            				]);
                        echo $this->Form->control('idtipo', [
		            					'options' 	=> $parentTipos,
		            					'class' 	=> 'form-control form-control-lg',
		            					'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
		            					'label' 	=> [
		            						'text' 		=> 'Tipo',
		            						'class' 	=> 'control-label input-label'
		            					]
		            				]);
                        echo $this->Form->control('link_comp', [
                                        'class' => 'form-control form-control-lg',
										'placeholder' => 'http://',
                                        'type' 	=> 'text',
                                        'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                                        'label' => [
                                            'text' 	=> 'Onde Comprar',
                                            'class' => 'control-label input-label'
                                        ]
                                    ]);
                        echo $this->Form->control('tags', [
                                        'class' => 'form-control form-control-lg',
                                        'type' 	=> 'text',
                                        'style' => 'width: 230px',
                                        'placeholder' => '#tag1 #tag2 #tag3'
                                    ]);
				?>
			</div>	
		</div>
	</div>
	</fieldset>
	
    <div class="text-right">
        <i class='material-icons md-24 align-middle'>
		<?= $this->Form->button(__('Salvar'),
			[
				'style' => 'margin-right: 150px',
				'class' => 'btn btnW btn-success',
				'title' => 'Salvar'
			]
		) ?>
		<?= $this->Form->end() ?></i>
	</div>
			
</div>
