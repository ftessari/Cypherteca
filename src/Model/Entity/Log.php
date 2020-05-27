<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Log Entity
 *
 * @property int $id
 * @property int $quem
 * @property \Cake\I18n\FrozenTime $quando
 * @property int $onde
 * @property string $o_que
 * @property int $pontos
 * @property string|null $argumento_extra
 */
class Log extends Entity
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
        'quem' => true,
        'quando' => true,
        'onde' => true,
        'o_que' => true,
        'pontos' => true,
        'argumento_extra' => true
    ];
}
