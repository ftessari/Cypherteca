<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Utitulo Entity
 *
 * @property int $id_user
 * @property int $id_titulo
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Titulo $titulo
 */
class Utitulo extends Entity
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
        '*' => true, // Deixa todos os campos acessíveis
        'usuario' => true,
        'titulo' => true
    ];
}
