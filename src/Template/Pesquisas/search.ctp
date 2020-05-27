<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pesquisa $pesquisa
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pesquisas'), ['action' => 'index']) ?></li>
    </ul>
	<form action='index' class='form-header'>
			<input class='au-input au-input--xl' type='text' id='busca' name='busca' placeholder='Pesquise por nome fantasia ou razão social'>
			<button type='submit' class='btn btn-primary'>Buscar</button>
		</form>
</nav>
<div class="pesquisas form large-9 medium-8 columns content">
    <?= $this->Form->create($pesquisa) ?>
    <fieldset>
        <?php
			echo $this->Form->control('id_user', [
                            'type' => 'hide',
                            'value' => $this->request->Session()->read('Auth.User.id')
                        ]);
            echo $this->Form->control('termo', [
							'class' => 'form-control form-control-lg',
							'type' 	=> 'text',									
							'style' => 'margin-top: 5px; margin-botton: 15px; width: 380px',
							'label' => [
								'text' 	=> 'Pesquisa',
								'class' => 'control-label input-label'									
							]
						]);
			echo $this->Form->control('datainfo', [
                            'type' => 'hide',
                            'value' => date('Y-m-d H:s')
                        ]);
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Buscar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn btn-success'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
