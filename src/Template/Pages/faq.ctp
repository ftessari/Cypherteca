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
		<h3><?= __('F.A.Q.') ?></h3>
		<div id='faq'>
		<p><b>Sobre a rede social</b></p>
			<p><b>1- Quem pode se associar à rede Cypherteca?</b><br>
			Todos, sem exceção nem exclusão de nenhum mérito.</p>
			
			<p><b>2- Cypherteca é uma rede monetizada? Isto é, visa algum tipo de comércio ou lucro?</b><br>
			Não, mas aceitamos doações.</p>
			
			<p><b>3- Devo pagar alguma taxa para entrar nesta rede ou no futuro?</b><br>
			Não, a rede Cypherteca é totalmente livre e gratuito e sempre será.</p>
			
			<p><b>4- Cypherteca é uma rede dedicada à pirataria?</b><br>
			Não. Nossa visão é de partilha. Pura ideologia cypherpunk. Sem visar lucro.</p>
			
			<p><b>5- Cypherteca é comunista/socialista?</b><br>
			Não. Cypherteca é ideologicamente cypherpunk. Não temos uma posição política.</p>
			
			<p><b>6- Cypherteca é anarquista?</b><br>
			Não. Cypherteca é ideologicamente cypherpunk. Não temos uma posição política.</p>
			
			<p><b>Sobre a estrutura</b></p>
			<b>7- Como funciona a rede Cyphereteca?</b><br>
			A rede foi criada para ser de fácil backup, de modo que hospedamos um catálogo de link para download de obras diversas.<br>
			Implementamos metadados, organizamos informações para propiciar um mecanismo de busca eficiente. Onde as pessoas possam fazer buscas,
			além de pedidos de obras, e assim compartilhar com toda a sociedade.<br>
			Mas não hospedamos os arquivos em si. O que facilita a manutenção.
			</p>
			
			
		<p><b>Sobre a organização hierarquica</b></p>			
			<p><b>8- Quem são os administradores/ desenvolvedores/ curadores?</b><br>
			Isso pouco importa. Não estamos aqui para promossão pessoal.
			</p>
			<p><b>9- Quem pode fazer parte da administradores/ desenvolvedores/ curadores?</b><br>
			Administração e desenvolvimento são áreas restritas ao pessoal de confiança comprometidos com a causa.<br>
			Já a curadoria (que é um cargo de moderação), pode ser alcançado desde que exista a necessidade, e o individuo seja participativo na rede.
			</p>
		
		<p><b>Sobre as obras</b></p>
		<p><b>10- Que tipo de obras posso compartilhar?</b><br>
			Todo tipo. Livros, revistar, partituras, sonetos, poemas, pergaminhos, artbooks, dicionários, quadrinhos. Até mesmo audio-livro.<br>
			Pedimos que os arquivos estejam campactados, de preferência em <b>.zip</b>.<br>
			Esta medida ajuda tanto no download quanto na segurança, evitando alguns tipos de virus.</p>
		<p><b>11- Posso compartilhar obras em outras línguas?</b><br>
			Sim, mas temos preferência pelo português. Caso não exista em português indique o idioma correto ao cadastar a obra.</p>
		<p><b>12- Posso compartilhar material erótico?</b><br>
			Sim, apenas lembre-se de especificar a categoria correta.</p>
		<p><b>13- Posso compartilhar um photobook?</b><br>
			Se for apenas uma coleção de imagens que você fez, não. Mas se for um estudo, seja de fotografia ou desenho (tal como artbook), 
			sim, é bem-vindo.</p>
		<p><b>14- Sou escritor(a) independente, e...</b><br>
			Bem-vindo(a)! Temos um lugar na primeira fila para você. Não só para partilhar, mas para promover sua obra e direcionar para um <i>link</i> de compra.
			Se desejar, fale com alguém da Curadoria sobre isso.</p>
		
		<a href="<?= $this->Url->build(['controller' => 'Pages', 
											'action' => 'regras']) ?>">
					Por favor, leia as <b>Regras</b> clicando aqui
		</a>.

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
