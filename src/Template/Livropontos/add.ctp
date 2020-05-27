<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroponto $livroponto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Livropontos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="livropontos form large-9 medium-8 columns content">
    <?= $this->Form->create($livroponto) ?>
    <fieldset>
        <legend><?= __('Add Livroponto') ?></legend>
        <?php
            echo $this->Form->control('idlivro');
            echo $this->Form->control('iduser');
            echo $this->Form->control('pontos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
