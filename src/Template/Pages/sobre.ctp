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
                <?= $listar->categoria ?>
            </a>
            <br>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <!-- Definição e rota para index -->
    <div class="row">
		<h3><?= __('Sobre') ?></h3>
		<div id='sobre'>
			<div class="row">
				<div class="col-9">
					<p>Cypherteca é uma rede social onde seus participantes doam seu tempo em prol da 
					informação, cultura e entretenimento.<br>
					Seja compartilhando obras, organizando seus metadados, traduzindo ou até mesmo
						produzindo obras.</p>
		
					<p>Mecanismos de rankeamento foram desenvolvidos para tornar este processo mais 
					divertido e organizado.</p>
					
					<p>Defendemos o ideal cypherpunk onde a informação deve ser livre.</p>
				</div>
				<div class="col-3 center">
					
					<div class="notice" style="font-size: 12px">
						Oi! Meu nome é Tecarina.<br>
						Sou o <i>"bot"</i> assistênte desta adorável biblioteca.<br>
						Eu apenas envio mensagens e avisos. <br>...também estou em desenvolvimento. :3
					</div>
					<?= $this->Html->image("system/teca_ok.png", [
						"width" => "70px"
					]) ?>
				</div>
			</div>
			
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
