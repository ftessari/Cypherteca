<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Geral Entity
 *
 * @property int $id
 * @property string $logo
 * @property string|null $sub_titulo
 * @property string|null $livro_capa_padrao
 * @property float $livro_capa_tamanho
 * @property int $livro_capa_max_x
 * @property int $livro_capa_max_y
 * @property int $livro_capa_min_x
 * @property int $livro_capa_min_y
 * @property string|null $avatar_padrao
 * @property float $avatar_tamanho
 * @property int $avatar_max_x
 * @property int $avatar_max_y
 * @property int $avatar_min_x
 * @property int $avatar_min_y
 * @property string|null $info_lateral
 * @property string|null $rodape
 */
class Geral extends Entity
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
        'logo' => true,
        'sub_titulo' => true,
        'livro_capa_padrao' => true,
        'livro_capa_tamanho' => true,
        'livro_capa_max_x' => true,
        'livro_capa_max_y' => true,
        'livro_capa_min_x' => true,
        'livro_capa_min_y' => true,
        'avatar_padrao' => true,
        'avatar_tamanho' => true,
        'avatar_max_x' => true,
        'avatar_max_y' => true,
        'avatar_min_x' => true,
        'avatar_min_y' => true,
        'info_lateral' => true,
        'rodape' => true
    ];
}
