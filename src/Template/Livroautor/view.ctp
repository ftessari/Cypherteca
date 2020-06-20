<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Livroautor $livroautor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li>
            <a  href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn">
                Autores
            </a>
        </li>
        <hr>
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
    </ul>
</nav>
<div class="livroautor view large-9 medium-8 columns content">
    <h3><?= h($livroautor->autor) ?></h3>    
    <table class="vertical-table">
	<tr>
		<th scope="row"></th>
		<td scope="row">		
			<?= $this->Html->link(__('Editar'),
					[
						'action' => 'edit', $livroautor->id
					],
					[
						'class' => 'btn',
						'title' => 'Editar Autor',
						'style' => 'font-size: 12px'
					])
			?>		
			<?= $this->Html->link(__('!'),
				[
					'controller' => 'Dashboard',
					'action' => 'denunciaAutor',
								$this->request->getSession()->read('Auth.User.id'), 
								$livroautor->id
				],
				[
					'class' => 'btn',
					'title' => 'Denúnciar Autor',
					'style' => 'font-size: 12px'
				]) 
			?>
		</td>
	</tr>
        <tr>
            <td height="100">
                <?php
                if (!($livroautor->foto)) {
                    echo $this->Html->image("autores/default.png", [
                        "align" => "right"]);
                } else {
                    echo $this->Html->image("autores/" . $livroautor->foto, [
                        "align" => "right"]);
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($livroautor->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nascido(a) em:') ?></th>
            <td><?= h($livroautor->datanasci) ?></td>
        </tr>
        <?php
        if (!empty($livroautor->datafalec)) {
            echo "
            <tr>
                <th scope='row'>" . __('Falecido(a) em:') . "</th>
                <td>" . h($livroautor->datafalec) . "</td>
            </tr>";
        }
        ?>
    </table>
    <!-- Biografia -->
    <div class="row">
        <div class="col-12" style="margin-top: 5px; margin-bottom: 5px">
            <h3>Biografia</h3>
            <?php
                if ($livroautor->bio) {
                   echo $this->Text->autoParagraph($livroautor->bio);
                } else {
                  echo  "<a href=" .$this->Url->build(
                            ['action' => 'edit', $livroautor->id]
                            ). " class='btn'>
                                Informe a Biografia
                        </a>";
                }
            ?>
			<br><br>
        </div>
    </div>

    <!-- Obras -->
    <div class="row">
        <div class="col-12" style="margin-top: 5px; margin-bottom: 5px">
            <h3>Obras</h3>
            <fieldset>
                <table class="table table-hover" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col" width="120"><?= $this->Paginator->sort('') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Título') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Tags') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                         foreach ($qlivros as $livro) {
                             echo
                                 "<tr>
                                     <td height='45' class='zoom'>
			            		           <a href= ". $this->Url->build(['controller' => 'Livros', 'action' => 'view', $livro->id]) . ">";
			        			          if (!$livro->capa) {
                                             echo $this->Html->image('capas/default.png');
                                           }
                                           else {
                                             echo $this->Html->image('capas/'.$livro->capa);
                                           }
			        		    echo "</a>
			                         </td>
			                         <td>";
			        			       echo $this->Html->link(__(h($livro->titulo)),
                                         ['controller' => 'Livros', 'action' => 'view' , $livro->id]);
			        			       echo "<br>".
                                        h($livro->subtitulo);
			        			echo "</td>
                                        <td>";
			        			        if ($livro->tags) :
                                            $arr = explode('#', $livro->tags); // transforma a string em array.

                                            for($i = 1; $i <  count($arr); $i++){
                                                echo "<a href=".$this->Url->build(['controller' => 'Livros',
                                                        'action' => 'index?busca='.$arr[$i]
                                                    ]).">#".
                                                    $arr[$i]."</a>";
                                            }
                                        endif;

			        			echo "</td>
                                 </tr>";
                         }
                         ?>
                        </tbody>
                </table>
            </fieldset>
        </div>
    </div>
</div>
