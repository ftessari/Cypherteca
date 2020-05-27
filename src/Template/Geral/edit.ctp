<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Geral $geral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $geral->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $geral->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Geral'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="geral form large-9 medium-8 columns content">
    <?= $this->Form->create($geral, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Edit Geral') ?></legend>
        <?php
            echo $this->Form->control('logo[]',
				[
                    'class' => 'form-control form-control-lg',
                    'type' => 'file',
                    //'multiple' => 'true', // Mais de um arquivo
                    'style'     => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' 	=> 'Logo',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('sub_titulo',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => 'Sub Título',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_padrao[]',
				[
                    'class' => 'form-control form-control-lg',
                    'type' => 'file',
                    //'multiple' => 'true', // Mais de um arquivo
                    'style'     => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' 	=> '[Livro] Capa - Padrão',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_tamanho',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Livro] Capa - tamanho (MB)',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_max_x',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Livro] Capa - Max x',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_max_y',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Livro] Capa - Max y',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_min_x',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Livro] Capa - Min x',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('livro_capa_min_y',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Livro] Capa - Min y',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_padrao[]',
				[
                    'class' => 'form-control form-control-lg',
                    'type' => 'file',
                    //'multiple' => 'true', // Mais de um arquivo
                    'style'     => 'margin-top: 5px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' 	=> '[Avatar] Padrão',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_tamanho',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Avatar] - tamanho (MB)',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_max_x',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Avatar] Max x',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_max_y',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Avatar] Max y',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_min_x',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Avatar] Min x',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('avatar_min_y',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => '[Avatar] Min y',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('info_lateral',
                [
                    'empty' => true,
                    'class' => 'form-control form-control-lg',
                    // 'type' => 'text',
                    'style' => 'margin-top: 3px; margin-botton: 15px; width: 230px',
                    'label' => [
                        'text' => 'Informativo (Lateral)',
                        'class' => 'control-label input-label'
                    ]
                ]);
            echo $this->Form->control('rodape',
                [
                    'empty' => true,
					'class' => 'form-control form-control-lg',
					// 'type' => 'text',
                    'style' => 'width: 230px',
                    'label' => [
                        'text' => 'Rodapé',
                        'class' => 'control-label input-label'
                    ]
                ]);
        ?>
    </fieldset>
    <div class="text-right"><i class='material-icons md-24 align-middle'>
            <?= $this->Form->button(__('Salvar'),
                [
                    'style' => 'margin-right: 550px',
                    'class' => 'btn btn-success',
                    'title' => 'Salvar'
                ]
            ); ?>
            <?= $this->Form->end() ?></i>
    </div>
</div>
