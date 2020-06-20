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
            <a  href="<?= $this->Url->build(['controller' => 'Livros', 'action' => 'index']) ?>" class="btn">
                Livros
            </a>
        </li>
        <li>
            <a  href="<?= $this->Url->build(['controller' => 'Livrocat', 'action' => 'index']) ?>" class="btn">
                Categorias
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroserie', 'action' => 'index']) ?>" class="btn">
                Séries
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroeditoras', 'action' => 'index']) ?>" class="btn">
                Editoras
            </a>
        </li>
        <li><a  href="<?= $this->Url->build(['controller' => 'Livroautor', 'action' => 'index']) ?>" class="btn">
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
		<h3><?= __('Regras') ?></h3>
		<div id='regras'>
				<h5>aos Associados</h5>
				<ul style="list-style: none;">
				<b>(art.1) das Condutas</b> 
					<li>§.1- Você não deve falar sobre a Cypherteca;</li>
					<li>§.2- Você não deve falar sobre a Cypherteca;</li>
					<li>§.3- Não há punição caso tenha quebrado as duas primeiras regras;</li>
					<li>§.4- Mantenha a biblioteca limpa. Nada de escrever '<b>4551M</b>' ou <i>CoMo Se eStIvEsSe nO sEu bLoG fOfo</i>;</li>
					<li>§.5- Evite palavrões, você será penalizado;</li>
					<li>§.6- Trate os outros membros como deseja ser tratado. 
						<quote>" -Seja a mudança que deseja ver no mundo."</quote> ~ M. Ghandhi</li>
					<li>§.7- <b>Ninguém é obrigado a se cadastrar para realizar <i>downloads</i></b>. Mas ao se cadastrar você indica que deseja 
						participar desta comunidade e que concorda com seus termos. Leia-os antes de se cadastrar.
					</li>
				<br>
				
				<b>(art.2) dos Direitos</b>
					<li>§.1- Cypherteca não é uma democracia, a Curadoria tem a ultima palavra;</li>
					<li>§.2- Cypherteca é um privilégio! Uma doação coletiva de tempo;</li>
					<li>§.3- Seus direitos terminam onde começam o do próximo;</li>
					<li>§.4- O associado deve conquistar seus direitos trabalhando pela biblioteca;</li>					
				<br>
				
				<b>(art.3) das Proibições</b>
					<li>§.1- É proibido apologia a drogas; (não se aplica à obras)</li>
					<li>§.2- É proibido apologia a pedofilia; (se aplica à obras)</li>
					<li>§.3- É proibido apologia à violência; (pode ser aplicado à obras)</li>					
					<li>§.4- É proibido apologia ao nazismo; (não se aplica à obras)</li>
					<li>§.5- É proibido apologia ao marxismo; (não se aplica à obras)</li>
					<li>§.6- É proibido qualquer tipo de comércio entre os associados;</li>
					<li>§.7- O associado é livre para questionar as proibições por <i>email</i> ou <i>chat</i>, 
						mas <b>não</b> em comentários de obras ou no 'Mural' da comunidade. (vide: art.2:§.1)</li>
				<br>
				
				<b>(art.4) dos Avatares</b>
					<li>§.1- Utilize qualquer tipo de avatar, com as seguintes excessões, a saber:</li>
					<li>
					<ul style="list-style: none;">
					<li>§.2.0- Estão proibidos avatares com: (..)</li> 
						<li>
							§.2.1- ...temática de sexo explicito, mesmo que em desenho (vide: art.1:§.4);
						</li>
						<li>
							§.2.2- ...temática de violência (<i>gore</i>) mesmo que em desenho (vide: art.1:§.4);
						</li>
						<li>
							§.2.3- ...ideologia socio-política ou bandeiras de partidos políticos. (vide: art.1:§.4);
						</li>
						<li>
							§.2.4- ...propagandas de qualquer natureza. (vide: art.1:§.4);
						</li>
						<li>
							§.2.5- ...simbolos associados a times de futebol. (vide: art.1:§.4);
						</li>
						<li>
							§.2.6- ...simbolos associados restritamente a sociedades ditas secretas. (vide: art.1:§.4);
						</li>
					</ul>				
				</ul>
				
				<br>
				<ul style="list-style: none;">
				<b>(art.5) das Obras</b>
					<li>§.1- Todas as obras são bem-vindas. Desde que respeite as proibições do art.3;</li>					
					<li>
						§.2- Obras de autores independentes (sem editora), que se sintam desconfortáveis
						de ver suas obras aqui, podem entrar em contato com a administração e pedir sua remoção. 
						Cada caso será estudado;
					</li>
					<li>
						§.3- É extremamente importante o respeito a classificação por <b>categoria</b> no cadastro 
						de cada obra. Isto ajuda muito à biblioteca;
					</li>		
					<ul style="list-style: none;">
						<li>§.4.0- Os <i>links</i> de arquivos para <b>download</b> devem respeitar a extensão proposta no cadastro.</li>	
						<li>§.4.1- O arquivo pode e deve ser compactado (de preferência em arquivo <b>.zip</b>);</li>	
						<li>§.4.2- Caso o arquivo necessite de senha a mesma deve ser informada na descrição;</li>
						<li>
							§.4.3- Links que necessitem de cadastro para download serão removidos e o associado penalizado;<br>
									(<i>Exceção é feita à links do <b>Telegram</b>, desde que respeitando às regras.</i>)
						</li>						
						<li>§.4.4- Links que forem detectados com arquivos nossivos (tais como virus) serão deletados e o associado será banido;</li>						
					</ul>
				</ul>
			<br>
			<ul style="list-style: none;">
				<b>(art.6) a Curadoria</b>
				<li>
					§.único- A Curadoria esta livre para alterar qualquer regra, e avisará caso seja necessário.<br>
					O associado é livre para indicar novas regras ou questionar a eficácia de alguma, 
					bem como o motivo de tal regra estar listada aqui.<br>
					(vide: art.2:§.1)
				</li>

                <p style='text-align: right'>~ A Curadoria</p>
               
			<ul>
			<li><?= $this->Html->link(__('Registrar-se'), ['controller' => 'Usuarios', 'action' => 'add'])?></li>
            </ul>
		</div>       
    </div>
</div>
