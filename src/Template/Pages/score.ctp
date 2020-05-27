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
            </a><br>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="livros index large-9 medium-8 columns content">
    <div class="row">
		<h3><?= __('Pontos') ?></h3>
        <div class="row">
            <div class="col-9">
                <p>Como ganhar pontos(...)</p>
                <ul style="list-style: none;" class="notice">
                    <li>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Cadastro de associado</b>
                                <th scope="col" width="200">Bio</th>
                                <td><?= $qpontos->user_bio  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Cadastro de obras</b>
                                <th scope="col" width="200">Nova obra</th>
                                <td><?= $qpontos->nova_obra  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Link de Upload</th>
                                <td><?= $qpontos->livro_link  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Sub título</th>
                                <td><?= $qpontos->stitulo  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Adicionar capa</th>
                                <td><?= $qpontos->capa  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Atribuir autor</th>
                                <td><?= $qpontos->autor  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Número de páginas</th>
                                <td><?= $qpontos->n_paginas  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Nova obra</th>
                                <td><?= $qpontos->categoria  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Data da Publicação</th>
                                <td><?= $qpontos->datapub  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Nova obra</th>
                                <td><?= $qpontos->edicao  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Atribuir editora</th>
                                <td><?= $qpontos->editora  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Nova obra</th>
                                <td><?= $qpontos->idioma  ?> ponto(s)</td>
                                <td></td>
                            </tr><tr>
                                <th scope="col">ISBN</th>
                                <td><?= $qpontos->isbn  ?> ponto(s)</td>
                                <td></td>
                            </tr><tr>
                                <th scope="col">Atribuir série</th>
                                <td><?= $qpontos->serie  ?> ponto(s)</td>
                                <td></td>
                            </tr><tr>
                                <th scope="col">Sinopse</th>
                                <td><?= $qpontos->sinopse  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Link de compra</th>
                                <td><?= $qpontos->link_comp  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Avaliar obra</th>
                                <td><?= $qpontos->avalia  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Comentar</th>
                                <td><?= $qpontos->comentar  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Autor</b>
                                <th scope="col" width="200">Novo autor</th>
                                <td><?= $qpontos->novo_autor  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Atribuir foto</th>
                                <td><?= $qpontos->autor_foto  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Incluir biografia</th>
                                <td><?= $qpontos->autor_bio  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Categorias</b>
                                <th scope="col" width="200">Nova categoria</th>
                                <td><?= $qpontos->nova_cat  ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Séries</b>
                                <th scope="col" width="200">Nova série</th>
                                <td><?= $qpontos->nova_serie ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Editoras</b>
                                <th scope="col" width="200">Nova editora</th>
                                <td><?= $qpontos->nova_editora ?> ponto(s)</td>
                                <td></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-light table-borderless vertical-table">
                            <tr><b>Outros</b> (<i>Pontos atribuidos pela Curadoria</i>)
                                <th scope="col" width="200">Digitalização</th>
                                <td><?= $qpontos->digitalizacao ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Autor Indie</th>
                                <td><?= $qpontos->autoral ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Rastreio</th>
                                <td><?= $qpontos->rastreio ?> ponto(s)</td>
                                <td>(Conseguir uma obra específica)</td>
                            </tr>
                            <tr>
                                <th scope="col">Revisão</th>
                                <td><?= $qpontos->revisao ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="col">Tradução</th>
                                <td><?= $qpontos->traducao ?> ponto(s)</td>
                                <td></td>
                            </tr>
                            <!-- <tr>
                        <th scope="col">Agraecimento</th>
                        <td><?= $qpontos->agraecimento ?> ponto(s)</td>
                        <td></td>
                    </tr>
                   <tr>
                        <th scope="col">desgosto</th>
                        <td><?= $qpontos->desgosto ?> ponto(s)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">tags</th>
                        <td><?= $qpontos->tags ?> ponto(s)</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="col">palavra_proibida</th>
                        <td><?= $qpontos->palavra_proibida ?> ponto(s)</td>
                        <td></td>
                    </tr>
                      -->
                     </table>
                    </li>
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
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'Pages',
                            'action' => 'titulos']) ?>">
                            Títulos
                        </a>
                    </p>
                </ul>
            </div>
            <div class="col-3">
                <?php echo $this->Html->image("system/teca_l.png", [
                    "width" => "70px"
                ]); ?>
                <div class="notice" style="font-size: 12px">
                    Os pontos são distribuidos seguindo a padronização ao lado.
                    Mas a Curadoria também pode adicionar pontos ou subitrai-los.
                </div>
            </div>
        </div>
    </div>
</div>
