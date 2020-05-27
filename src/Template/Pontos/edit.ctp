<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ponto $ponto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
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
    </ul>
</nav>
<div class="pontos form large-9 medium-8 columns content">
    <?= $this->Form->create($ponto) ?>
		<?php	
			echo "<h1>Pontos</h1>
			<div class='row'>
			<div class'col-12'>

			<h4>das Obras</h4>
			<div class='row'>
				<div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
			echo $this->Form->control('nova_obra', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Nova Obra',
						'class' => 'control-label'
					]
			]);
			echo $this->Form->control('link_comp', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Link de compra',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('stitulo', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Sub-Título',
						'class' => 'control-label'
					]
            ]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
			 echo $this->Form->control('livro_link', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Upload',
						'class' => 'control-label'
					]
            ]);
            echo $this->Form->control('capa', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Capa',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('autor', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Atribuir Autor',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
            echo $this->Form->control('n_paginas', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Nº Páginas',
						'class' => 'control-label'
					]
			]);
			echo $this->Form->control('categoria', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Atribuir Categoria',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('datapub', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Publicação',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
            echo $this->Form->control('edicao', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Edição',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('editora', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Atribuir Editora',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('idioma', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Atribuir Idioma',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
            echo $this->Form->control('isbn', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'ISBN',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('serie', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Atribuir Série',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('tags', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'tags (cada)',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
            echo  $this->Form->control('sinopse', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Sinopse',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('avalia', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Avaliar Obra',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('comentar', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Comentar',
						'class' => 'control-label'
					]
			]);
			echo "</div></div></div></div>
			<div class='row'>
			<div class'col-12'>
			<h4>das Tarefas</h4>
			<div class='row'>
				<div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
				
            echo $this->Form->control('digitalizacao', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Digitalização',
						'class' => 'control-label'
					]
			]);   
            echo $this->Form->control('rastreio', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Rastreio',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
            echo $this->Form->control('revisao', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Revisão',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('traducao', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Tradução',
						'class' => 'control-label'
					]
			]);
			echo "</div></div></div></div>
			<div class='row'>
			<div class'col-12'>
			<h4>Outros</h4>
			<div class='row'>
				<div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
				          
			echo $this->Form->control('autoral', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Autor Indie',
						'class' => 'control-label'
					]
			]);
            echo $this->Form->control('agraecimento', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Like (Para quem recebe)',
						'class' => 'control-label'
					]
            ]);
            echo $this->Form->control('desgosto', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Dislike (Para quem recebe)',
						'class' => 'control-label'
					]
			]);
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";	
            echo $this->Form->control('palavra_proibida', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Palavra proibida',
						'class' => 'control-label'
					]
			]);
			echo $this->Form->control('user_bio', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Bio. do Associado',
						'class' => 'control-label'
					]
            ]);	
			echo "</div></div></div></div>
			<div class='row'>
			<div class'col-12'>
			<h4>Novos</h4>
			<div class='row'>
				<div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
			
			echo $this->Form->control('novo_autor', [
					'empty' => true,
					'class' => 'form-control form-control-lg',
					'type' => 'text',
					'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
					'label' => [
						'text' => 'Autor',
						'class' => 'control-label'
					]
            ]);	
			echo $this->Form->control('autor_foto', [
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
								'label' => [
									'text' => 'Foto (Autor)',
									'class' => 'control-label'
								]
						]);	
			echo $this->Form->control('autor_bio', [
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
								'label' => [
									'text' => 'Biografia (Autor)',
									'class' => 'control-label'
								]
						]);	
			echo "</div><div class'col-sm-12 col-md-6 col-lg-3 col-xl-3'>";
			echo $this->Form->control('nova_cat', [
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
								'label' => [
									'text' => 'Categoria',
									'class' => 'control-label'
								]
						]);	
			echo $this->Form->control('nova_serie', [
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
								'label' => [
									'text' => 'Série',
									'class' => 'control-label'
								]
						]);	
			echo $this->Form->control('nova_editora', [
								'empty' => true,
								'class' => 'form-control form-control-lg',
								'type' => 'text',
								'style' => 'margin-top: 3px; margin-botton: 15px; width: 80px',
								'label' => [
									'text' => 'Editora',
									'class' => 'control-label'
								]
						]);				
						
						echo "</div></div></div>
						</div>";
					?>
			
    <div class="text-right"><i class='material-icons md-24 align-middle'>
        <?= $this->Form->button(__('Salvar'),
            [
                'style' => 'margin-right: 150px',
                'class' => 'btn btnW btn-success',
                'title' => 'Salvar'
            ]
        ); ?>
        <?= $this->Form->end() ?></i>
    </div>
</div>
