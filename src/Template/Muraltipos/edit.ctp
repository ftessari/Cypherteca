<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muraltipo $muraltipo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $muraltipo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $muraltipo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Muraltipos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="muraltipos form large-9 medium-8 columns content">
    <?= $this->Form->create($muraltipo) ?>
    <fieldset>
        <legend><?= __('Editar tipo de notificação para o Mural') ?></legend>
        <?php
            echo $this->Form->control('tipo',[							
							'type' => 'email',
							'class' => 'form-control form-control-lg',													
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Tipo',
								'class' => 'control-label input-label'									
							]
						]);
        ?>
    </fieldset>
	<div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn btnW btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
