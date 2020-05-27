<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Umail Entity
 *
 * @property int $id
 * @property string $titulo
 * @property int $de
 * @property int $para
 * @property string $texto
 * @property \Cake\I18n\FrozenTime $data_envio
 * @property \Cake\I18n\FrozenTime|null $data_lido
 * @property int|null $cc
 */
class Umail extends Entity
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
        'de' => true,
        'para' => true,
        'texto' => true,
        'data_envio' => true,
        'data_lido' => true,
        'idresp' => true
    ];


}
