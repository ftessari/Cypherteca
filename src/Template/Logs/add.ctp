<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Log $log
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Logs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logs form large-9 medium-8 columns content">
    <?= $this->Form->create($log) ?>
    <fieldset>
        <legend><?= __('Add Log') ?></legend>
        <?php
            echo $this->Form->control('quem');
            echo $this->Form->control('quando');
            echo $this->Form->control('onde');
            echo $this->Form->control('o_que');
            echo $this->Form->control('pontos');
            echo $this->Form->control('argumento_extra');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
