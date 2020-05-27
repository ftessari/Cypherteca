<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livrocomentario $livrocomentario
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
<div class="livrocomentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($livrocomentario) ?>
    <fieldset>
        <legend><?= __('Editar comentário para '. $titulo) ?></legend>
        <?php 
			// Editar com usuário 
		if ($this->request->getSession()->read('Auth.User.tipo') > 0) {
			echo $this->Form->control('moderador', ['value' => $this->request->getSession()->read('Auth.User.id'), 'type' => 'hidden']);
		}	// Editar como Admin
		elseif ($this->request->getSession()->read('Auth.User.id') == $livrocomentario->id_user) {
			echo $this->Form->control('id_user', ['value' => $this->request->getSession()->read('Auth.User.id'), 'type' => 'hidden']);
        }	// sem User logado
		else {
			return $this->redirect(['controller' => 'livros', 'action' => 'view', $livrocomentario->id_livro]);
                
		}
		echo $this->Form->control('id_livro', ['value' => $idLivro, 'type' => 'hidden']);
      //  echo $this->Form->control('data_pub', ['value' => date('Y-m-d H:i:s'), 'type' => 'hidden']);
       // echo $this->Form->control('ativo', ['value' => 1, 'type' => 'hidden']);
        echo $this->Form->control('data_alt', ['empty' => true, 'value' => date('Y-m-d H:i:s'), 'type' => 'hidden']);
        echo $this->Form->control('texto');
        
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'class' => 'btn btnW btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
