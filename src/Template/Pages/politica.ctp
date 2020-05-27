<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livro[]|\Cake\Collection\CollectionInterface $livros
 */
use Cake\ORM\TableRegistry;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if ($this->request->getSession()->read('Auth.User.id')) : ?>
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn btn-danger">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn btn-danger">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn btn-danger">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn btn-danger">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn btn-danger">
                Autores
            </a>
        </li>
        <hr>
        <?php endif; ?>

        <li class="heading"><?= __('Categorias') ?></li>
        <?php foreach ($qcategoria as $listar):?>
            <a href=<?= $this->Url->build(['controller' => 'Livros', 
											'action' => 'index?busca='.$listar->categoria]) ?>>
                <?php echo $listar->categoria;?>
            </a><br>
        <?php endforeach;?>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <!-- Definição e rota para index -->
    <div class="row">
		<h3><?= __('Politica') ?></h3>
		<div id='politica'>
			
				<p>A política interna dos regimentos que compõem as engrenagens de <b>Cypherteca</b> é 
				ideologicamente <b><i>Cypherpunk</i></b>. Isto é: Acreditamos que a informação deva ser livre!</p>
				
				<p>Conhecimento, cultura e entretenimento devem alcançar a todos, sem exclusão, sem 
				exceção.<br>
				Aqui seu poder econômico não importa, sua raça não importa nem a cor de sua pele, 
				sua definição sexual e/ou orientação sexual não importam.<br>
				Você é um espírito imortal neste universo onde compomos uma fraternidade cósmica. 
				E devemos aprender a conviver e respeitar-nos mutuamente. 
				Quer você acredite, goste ou ria de tal citação, não importa.</p>
				
				<p>Respeitamos sua opinião, seja qual for, mas igualmente, nos preservamos no direito				
				de discordar, não como <b>instituição <i>cypherpunk</i></b>, mas sim como seres 
				humanos que somos.</p>
					
				<p>Sobre a Política propriamente dita, <b>Cypherteca</b> se desprende de qualquer regimento 
				de tal natureza.<br> 
				Não temos interesse em estimular, apoiar ou criticar este ou aquele seguimento 
				politico e/ou filosófico.</p>
				
				<p>Obrigado por ler isto.</p>

            <p style='text-align: right'>~ A Curadoria</p>
            <p style="text-align: center">
                <a  href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'faq']) ?>">
                    FAQ
                </a>|
                <a href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'politica']) ?>">
                    Política
                </a>|
                <a href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'regras']) ?>">
                    Regras
                </a>|
                <a  href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'sobre']) ?>">
                    Sobre
                </a>|
                <a  href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'score']) ?>">
                    Pontos
                </a>|
                <a href="<?= $this->Url->build(['controller' => 'Pages',
                    'action' => 'titulos']) ?>">
                    Títulos
                </a>
            </p>
		</div>
    </div>
</div>
