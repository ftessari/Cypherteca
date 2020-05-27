<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Titulo Entity
 *
 * @property int $id
 * @property string $designicao
 * @property string|null $descricao
 * @property string|null $exigencia
 * @property string|resource $icone
 *
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Titulo extends Entity
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
        'designacao' => true,
        'descricao' => true,
        'exigencia' => true,
        'upload' => true,
        'upload[]' => true,
        'usuarios' => true
    ];
}
