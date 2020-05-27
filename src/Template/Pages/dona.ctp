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
		<h3><?= __('Por que doar?') ?></h3>
		<div id='dona'>
			<div class="row">
				<div class="col-9">
					<p>Para além de contribuir com a plataforma e incentivar a aquisição de novos títulos.</p>
                    <p>Eu (<i>Lain</i>) me disponho a melhorar o sistema, ajustar, corrigir e implementar segundo as
                        recomendações da própria comunidade.
                        E no futuro, quando a plataforma estive estável e livre de <b><i>bug´s</i></b> estarei
                        compartilhando seus códigos no <b><a href="https://github.com/lainsamui">github</a></b>,
                        para que qualquer um possa construir sua própria estrutura com facilidade.</p>
                    <p>Se desejar recomendar correções ou implementações úteis ou simplesmente divertida, entre em
                        contato comigo pelo nosso grupo de <b>Telegram</b>. Independente de você ter feito uma doação.</p>
                    <p>Mas, de qualquer forma... vamos lá, considere me pagar um café. 😉</p>
                        Programo muito mais com café! Você sustenta meu vício de cafeína que eu sustento o seu de leitura... que tal? xD
                    </p>
				</div>
				<div class="col-3 center">
					
					<div class="notice" style="font-size: 12px">
						Contribua, vai! Não seja mal diga... Siiiim!!! ?
					</div>
					<?= $this->Html->image("system/teca_up.png", [
						"width" => "70px"
					]) ?>
				</div>
			</div>
            <br>
            <div>
                <center>
                    <a target='_blank' href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FRELARQVKVZZN&source=url" target="_blank">
                        <?=  $this->Html->image("Paypal_QR_Code.png") ?>
                    </a>
                </center>
                <br>
                <?php
                echo "<center><form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
                                    <input type='hidden' name='cmd' value='_s-xclick'' />
                                    <input type='hidden' name='hosted_button_id' value='FRELARQVKVZZN' />
                                    <input type='image' src='https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif' border='0' name='submit' 
                                            title='PayPal - The safer, easier way to pay online!' 
                                            alt='Faça doações com o botão do PayPal' />
                                    <img alt='' border='0' src='https://www.paypal.com/pt_BR/i/scr/pixel.gif' width='1' height='1' />
                                </form></center>";
                ?>
            </div>
            <br><br>
			
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
