<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Visita Entity
 *
 * @property int $ID
 * @property string $page
 * @property \Cake\I18n\FrozenDate $data_visita
 * @property int $visitas
 */
class Visita extends Entity
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
        'page' => true,
        'data_visita' => true,
        'visitas' => true
    ];
}
