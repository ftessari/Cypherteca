<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Muralresposta Entity
 *
 * @property int $id
 * @property string $texto
 * @property \Cake\I18n\FrozenTime $dataini
 * @property int $iduser
 * @property int $status
 * @property \Cake\I18n\FrozenTime|null $dataalt
 * @property int $idmural
 * @property int|null $moderador
 */
class Muralresposta extends Entity
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
        'texto' => true,
        'dataini' => true,
        'iduser' => true,
        'status' => true,
        'dataalt' => true,
        'idmural' => true,
        'moderador' => true
    ];
}
