<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ponto Entity
 *
 * @property int $id
 * @property int $user_bio
 * @property int $livro_link
 * @property int $stitulo
 * @property int $capa
 * @property int $autor
 * @property int $n_paginas
 * @property int $categoria
 * @property int $datapub
 * @property int $edicao
 * @property int $editora
 * @property int $idioma
 * @property int $isbn
 * @property int $serie
 * @property int $tags
 * @property int $descri
 * @property int $avalia
 * @property int $comentar
 * @property int $digitalizacao
 * @property int $autoral
 * @property int $rastreio
 * @property int $revisao
 * @property int $traducao
 * @property int $agraecimento
 * @property int $desgosto
 * @property int $palavra_proibida
 *
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Ponto extends Entity
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
        'user_bio' => true,
        'livro_link' => true,
        'stitulo' => true,
        'capa' => true,
        'autor' => true,
        'n_paginas' => true,
        'categoria' => true,
        'datapub' => true,
        'edicao' => true,
        'editora' => true,
        'idioma' => true,
        'isbn' => true,
        'serie' => true,
        'tags' => true,
        'avalia' => true,
        'comentar' => true,
        'digitalizacao' => true,
        'autoral' => true,
        'rastreio' => true,
        'revisao' => true,
        'traducao' => true,
        'agraecimento' => true,
        'desgosto' => true,
        'palavra_proibida' => true,		
		'sinopse' => true,
		'novo_autor' => true,
		'autor_foto' => true,
		'autor_bio' => true,
		'nova_cat' => true, 
		'nova_serie' => true, 
		'nova_editora' => true, 
		'link_comp' => true,
		'nova_obra' => true 
    ];
}
