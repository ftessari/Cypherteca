<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroavaliacao $livroavaliacao
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $livroavaliacao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $livroavaliacao->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Livroavaliacao'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="livroavaliacao form large-9 medium-8 columns content">
    <?= $this->Form->create($livroavaliacao) ?>
    <fieldset>
        <legend><?= __('Edit Livroavaliacao') ?></legend>
        <?php
            echo $this->Form->control('id_livro');
            echo $this->Form->control('id_user');
            echo $this->Form->control('positivo');
            echo $this->Form->control('negativo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
