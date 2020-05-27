<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livroavaliacao Entity
 *
 * @property int $id
 * @property int $id_livro
 * @property int $id_user
 * @property int|null $positivo
 * @property int|null $negativo
 */
class Livroavaliacao extends Entity
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
        'id_livro' => true,
        'id_user' => true,
        'positivo' => true,
        'negativo' => true
    ];
}
