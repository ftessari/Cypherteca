<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosStatusFixture
 */
class UsuariosStatusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'usuarios_status';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_info' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'nota' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'id_status' => ['type' => 'index', 'columns' => ['id_status'], 'length' => []],
            'id_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'usuarios_status_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_status'], 'references' => ['status', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'usuarios_status_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id' => 1,
                'id_user' => 1,
                'id_status' => 1,
                'data_info' => '2019-08-02 19:05:56',
                'nota' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
