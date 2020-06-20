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
            <a  href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn">
                Incluir
            </a>
        </li>
        <hr>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn ">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn ">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn ">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn ">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn ">
                Autores
            </a>
        </li>
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
<div class="livros form large-9 medium-8 columns content">b
    <?= $this->Form->create($livro) ?>
    <fieldset>
        <legend><?= __('Novo Livro') ?></legend>
		<div class="container">
            <div class="row">
                <div class="col-12 notice">
					<ul style="padding-left: 5px; margin-bottom: -1px;">
						<b>Atenção!</b>
						<li>Para adicionar capa, entrar em modo de <b>edição</b> após conclusão desta etapa.</li>
						<li><b>Uploads</b> de <i>links</i> devem ser especificados na página da obra.</li>
					</ul>
				</div>
			</div>
			<br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <?php
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
                    echo  "</div><div class='col-sm-12 col-md-6 col-lg-6 col-xl-6'>";
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
<br>
    <!--Primeiro Link [Upload] -->
        <legend><?= __('Adicionar Link') ?></legend>
		<br>
        <div class="row">
            <div class="col-12 notice">
                <ul style="padding-left: 5px; margin-bottom: -1px;">
                    <li>Se for incluir o upload agora. Por favor, especifique o formato correto.</li>
                    <li>De preferência compacte em formato <b>.zip</b></li>
                    <li>Você poderá incluir quantos formatos da obra quiser, mais tarde.</li>
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
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-10">
                <?php
                echo $this->Form->control('link', [
                    'class' => 'form-control form-control-lg',
                    'type' 	=> 'text',
                    'placeholder' => 'http://',
                    'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
                    'label' => [
                        'text' 	=> 'Link',
                        'class' => 'control-label input-label'
                    ]
                ]);
                echo $this->Form->control('descricao', [
                    'class' => 'form-control form-control-lg',
                    'type' 	=> 'text',
                    'placeholder' => '',
                    'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
                    'label' => [
                        'text' 	=> 'Descrição',
                        'class' => 'control-label input-label'
                    ]
                ]);
                echo "</div>
				<div class='col-sm-12 col-md-4 col-lg-4 col-xl-2'>";
                  /* echo $this->Form->control('idformato', [
                        'options' 	=> $parentFormatos,
                        'class' 	=> 'form-control form-control-lg',
                        'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
                        'label' 	=> [
                            'text' 		=> 'Formatos',
                            'class' 	=> 'control-label input-label'
                        ]
                    ]); */
                echo $this->Form->control('partes', [
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'Única',
                    'style' => 'margin-top: 5px; margin-botton: 15px; width: 100%',
                    'min'=> '0',
                    'label' => [
                        'text' 	=> 'Nº da parte',
                        'class' => 'control-label input-label'
                    ]
                ]);
                ?>
            </div>
        </div>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 150px',
                    'class' => 'btn'
                ]
            ) ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
