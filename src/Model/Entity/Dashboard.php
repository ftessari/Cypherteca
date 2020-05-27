<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dashboard Entity
 *
 * @property int $id
 * @property int $solicitacao
 * @property int $usuario
 * @property string $descricao
 * @property \Cake\I18n\FrozenTime $datainfo
 * @property int $status
 * @property int|null $moderador
 * @property string|null $resposta
 * @property \Cake\I18n\FrozenTime|null $dataconclusao
 */
class Dashboard extends Entity
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
        'solicitacao' => true,
        'iduser' => true,
        'descricao' => true,
        'datainfo' => true,
        'status' => true,
        'idmod' => true,
        'resposta' => true,
		'alvo' => true,
		'idlink' => true,
        'dataconclusao' => true
    ];
}
