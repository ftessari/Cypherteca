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
            <a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn">
                Solicitação
            </a>			
        </li>
        <?php if ($this->request->getSession()->read('Auth.User.tipo') > 1) : ?>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Dashtipos', 'action' => 'index']) ?>" class="btn">
                Dashboard (Tipos)
            </a>
        </li>
        <?php endif; ?>
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
<div class="dashboard form large-9 medium-8 columns content">
    <?= $this->Form->create($dashboard) ?>
    <fieldset>
        <legend><?= __('Abrir solicitação') ?></legend>
        <?php
            echo $this->Form->control('solicitacao',[
                            'value' => 1, // Comunicado
                            'type' => 'hide'
                        ]);
			echo $this->Form->control('iduser',[
		                	'value' => $this->request->Session()->read('Auth.User.id'),
		                	'type' => 'hide'
		                ]);
            echo $this->Form->control('descricao', [
							'class' => 'form-control form-control-lg',							
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Descrição',
								'class' => 'control-label input-label'									
							]
						]);
            echo $this->Form->control('datainfo', [
                            'type' => 'hide',
                            'value' => date('Y-m-d H:s')
                        ]);
            echo $this->Form->control('status',[
                             'value' => 1,
                             'type' => 'hide'
                        ]);
          //  echo $this->Form->control('moderador');
          //  echo $this->Form->control('resposta');
           // echo $this->Form->control('dataconclusao', ['empty' => true]);
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
