<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livrocomentario Entity
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_livro
 * @property \Cake\I18n\FrozenTime $data_pub
 * @property int $status
 * @property \Cake\I18n\FrozenTime|null $data_alt
 * @property string $texto
 * @property int|null $moderador
 */
class Livrocomentario extends Entity
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
        'id_livro' => true,
        'data_pub' => true,
        'ativo' => true,
        'data_alt' => true,
        'texto' => true,
        'moderador' => true
    ];

}
