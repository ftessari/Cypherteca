<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; // PassHash

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $login
 * @property string $senha
 * @property \Cake\I18n\FrozenDate|null $datanasci
 * @property \Cake\I18n\FrozenDate $dataini
 * @property \Cake\I18n\FrozenTime|null $dataultimo
 * @property int $tipo
 * @property string|null $bio
 * @property string $email
 * @property string|null $site
 * @property string|null $telegram
 * @property string|resource|null $avatar
 * @property string|null $informe_admin
 *
 * @property \App\Model\Entity\Status[] $status
 * @property \App\Model\Entity\Ponto[] $pontos
 * @property \App\Model\Entity\Titulo[] $titulos
 */
class Usuario extends Entity
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
		'nome' => true,
        'login' => true,
        'senha' => true,
        'senha2' => true,
        'datanasci' => true,
        'dataini' => true,
        'dataultimo' => true,
        'tipo' => true,
        'bio' => true,
		'viewmail' => true,
        'email' => true,
        'site' => true,
        'telegram' => true,
        'idstatus' => true,
        'informe_admin' => true,
        'pontos' => true,
        'avatar' => true,
        'upload[]' => true,
		'upload' => true,
		'nsfw' => true,
		'heart' => true,
        'titulos' => true
    ];
	
	protected function _setSenha($value)
    {       
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);        
    }
}
