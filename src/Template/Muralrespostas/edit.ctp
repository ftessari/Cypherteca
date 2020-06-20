<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muralresposta $muralresposta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $muralresposta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $muralresposta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Muralrespostas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="muralrespostas form large-9 medium-8 columns content">
    <?= $this->Form->create($muralresposta) ?>
    <fieldset>
        <?php if ($modera == 0) { ?>
            <legend><?= __('Editar Resposta de '. $titulo) ?></legend>
        <?php } elseif ($modera == 1) { ?>
            <legend><?= __('Moderar Resposta de '. $titulo) ?></legend>
        <?php } ?>
        <?php
        echo $this->Form->control('texto',[
            'label' => [
                'text' 	=> 'Mensagem'
            ]
        ]);
        echo $this->Form->control('status',[
            'value' => 1,
            'type' => 'hide'
        ]);
        echo $this->Form->control('idmural',[
            'value' => $idMural,
            'type' => 'hide'
        ]);
        if ($modera == 0) {
            echo $this->Form->control('iduser', [
                'value' => $this->request->getSession()->read('Auth.User.id'),
                'type' => 'hide'
            ]);
        }
        elseif ($modera == 1) {
            echo $this->Form->control('moderador', [
                'value' => $this->request->getSession()->read('Auth.User.id'),
                'type' => 'hide'
            ]);
            echo $this->Form->control('dataalt', [
                'type' => 'hide',
                'value' => date('Y-m-d H:s')
            ]);
        }
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'class' => 'btn btnW btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
