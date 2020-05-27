<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Convite Entity
 *
 * @property int $id
 * @property int $id_user
 * @property \Cake\I18n\FrozenTime $data_ini
 * @property string $convite
 * @property \Cake\I18n\FrozenTime $data_criacao
 * @property int $usado
 */
class Convite extends Entity
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
        'id_user' => true,
        'data_ini' => true,
        'convite' => true,
        'data_criacao' => true,
        'usado' => true
    ];
}
