<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity
 *
 * @property int $id
 * @property string|resource|null $icone
 * @property string $nomeclatura
 * @property string $descricao
 *
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Status extends Entity
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
        'nomenclatura' => true,
        'descricao' => true,
        'upload' => true,
        'usuarios' => true
    ];
}
