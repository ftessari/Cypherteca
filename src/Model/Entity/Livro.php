<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livro Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $subtitulo
 * @property string|null $sinopse
 * @property \Cake\I18n\FrozenDate|null $ano
 * @property int|null $idioma
 * @property int|null $n_pag
 * @property int|null $editora
 * @property int|null $ISBN
 * @property int|null $autor
 * @property string|null $link_comp
 * @property int|null $categoria
 * @property int|null $serie
 * @property int|null $edicao
 * @property int|null $tipo
 * @property string|null $capa
 *
 * @property \App\Model\Entity\Livrocategorium $livrocategorium
 * @property \App\Model\Entity\Livroautor $livroautor
 * @property \App\Model\Entity\Livroidioma $livroidioma
 * @property \App\Model\Entity\Livrotipo $livrotipo
 * @property \App\Model\Entity\Livroeditora $livroeditora
 * @property \App\Model\Entity\Livroserie $livroserie
 */
class Livro extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'titulo' => true,
        'subtitulo' => true,
        'sinopse' => true,
        'ano' => true,        
        'n_pag' => true,
        'ISBN' => true,
        'link_comp' => true,
		'capa' => true,
        'idserie' => true,
        'edicao' => true,
        'idtipo' => true,        
		'ididioma' => true,
        'idcategoria' => true,
        'idautor' => true,
        'ideditora' => true,
		'upload[]' => true,
		'upload' => true,
        'tags' => true,
        // LivroLinks
        'link' => true,
        'descricao' => true,
        'partes' => true

    ];
}
