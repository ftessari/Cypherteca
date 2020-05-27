<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Geral $geral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Geral'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="geral form large-9 medium-8 columns content">
    <?= $this->Form->create($geral) ?>
    <fieldset>
        <legend><?= __('Add Geral') ?></legend>
        <?php
           // echo $this->Form->control('logo');
            echo $this->Form->control('sub_titulo');
            echo $this->Form->control('livro_capa_padrao');
            echo $this->Form->control('livro_capa_tamanho');
            echo $this->Form->control('livro_capa_max_x');
            echo $this->Form->control('livro_capa_max_y');
            echo $this->Form->control('livro_capa_min_x');
            echo $this->Form->control('livro_capa_min_y');
            echo $this->Form->control('avatar_padrao');
            echo $this->Form->control('avatar_tamanho');
            echo $this->Form->control('avatar_max_x');
            echo $this->Form->control('avatar_max_y');
            echo $this->Form->control('avatar_min_x');
            echo $this->Form->control('avatar_min_y');
            echo $this->Form->control('info_lateral');
            echo $this->Form->control('rodape');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
