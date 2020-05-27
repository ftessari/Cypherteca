<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UtitulosFixture
 */
class UtitulosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_titulo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_usuarios_has_titulos_titulos1_idx' => ['type' => 'index', 'columns' => ['id_titulo'], 'length' => []],
            'fk_usuarios_has_titulos_usuarios1_idx' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_user', 'id_titulo'], 'length' => []],
            'fk_usuarios_has_titulos_titulos1' => ['type' => 'foreign', 'columns' => ['id_titulo'], 'references' => ['titulos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_usuarios_has_titulos_usuarios1' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id_user' => 1,
                'id_titulo' => 1
            ],
        ];
        parent::init();
    }
}
