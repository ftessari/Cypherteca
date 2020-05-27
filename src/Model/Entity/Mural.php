<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mural Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $texto
 * @property int $id_user
 * @property int $tipo
 */
class Mural extends Entity
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
        'texto' => true,
        'iduser' => true,
        'dataenvio' => true,
        'ativo' => true,
        'idtipo' => true
    ];
}
