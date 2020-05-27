<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muralresposta $muralresposta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Muralrespostas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="muralrespostas form large-9 medium-8 columns content">
    <?= $this->Form->create($muralresposta) ?>
    <fieldset>
        <legend><?= __('Adicionar resposta para '. $titulo) ?></legend>
        <?php
            echo $this->Form->control('texto',[
                'label' => [
                    'text' 	=> 'Mensagem'
                ]
            ]);
            echo $this->Form->control('dataini', [
                'type' => 'hide',
                'value' => date('Y-m-d H:s')
            ]);
            echo $this->Form->control('iduser',[
                'value' => $this->request->Session()->read('Auth.User.id'),
                'type' => 'hide'
            ]);
            echo $this->Form->control('status',[
                'value' => 1,
                'type' => 'hide'
            ]);
          //  echo $this->Form->control('dataalt');
            echo $this->Form->control('idmural',[
                'value' => $idMural,
                'type' => 'hide'
            ]);
           // echo $this->Form->control('moderador');
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
