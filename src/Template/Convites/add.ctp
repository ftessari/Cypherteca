<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Convite $convite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Convites'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="convites form large-9 medium-8 columns content">
    <?= $this->Form->create($convite) ?>
    <fieldset>
        <legend><?= __('Add Convite') ?></legend>
        <?php
            echo $this->Form->control('id_user');
            echo $this->Form->control('data_ini');
            echo $this->Form->control('convite');
            echo $this->Form->control('data_criacao');
            echo $this->Form->control('usado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
