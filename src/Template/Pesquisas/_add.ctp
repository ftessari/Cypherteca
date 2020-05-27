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
</nav>
<div class="pesquisas form large-9 medium-8 columns content">
    <?= $this->Form->create($pesquisa) ?>
    <fieldset>
        <legend><?= __('Pesquisa') ?></legend>
        <?php
			echo $this->Form->control('id_user', [
                            'type' => 'hide',
                            'value' => $this->request->Session()->read('Auth.User.id')
                        ]);
            echo $this->Form->control('termo');
			echo $this->Form->control('datainfo', [
                            'type' => 'hide',
                            'value' => date('Y-m-d H:s')
                        ]);
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Pesquisar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn btn-success',
                    'title' => 'Pesquisar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
