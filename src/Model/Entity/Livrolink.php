<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livrolink Entity
 *
 * @property int $id
 * @property string $link
 * @property int $idformato
 * @property int $idlivro
 * @property int $iduser
 * @property \Cake\I18n\FrozenTime $dataenvio
 * @property int|null $n_downloads
 */
class Livrolink extends Entity
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
		'link' => true,
        'idformato' => true,
        'idlivro' => true,
        'iduser' => true,
		'partes' => true,
		'descricao' => true,
        'dataenvio' => true,
        'n_downloads' => true,
		'ativo' => true
    ];
}
