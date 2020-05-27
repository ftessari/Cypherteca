<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livroautor Entity
 *
 * @property int $id
 * @property string $autor
 * @property string|null $link
 */
class Livroautor extends Entity
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
        'autor' => true,
        'link' => true,
        'bio' => true,
        'datanasci' => true,
        'foto' => true,
        'indie' => true,
        'upload[]' => true,
        'datafalec' => true
    ];
}
