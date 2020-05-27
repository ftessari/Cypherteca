<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Palavrasproibida $palavrasproibida
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $palavrasproibida->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $palavrasproibida->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Palavrasproibidas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="palavrasproibidas form large-9 medium-8 columns content">
    <?= $this->Form->create($palavrasproibida) ?>
    <fieldset>
        <legend><?= __('Editar Palavra Proibída') ?></legend>
        <?php
            echo $this->Form->control('palavra',[							
							'type' => 'email',
							'class' => 'form-control form-control-lg',													
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 230px',
							'label' => [
								'text' 	=> 'Argumento',
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
