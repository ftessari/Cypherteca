<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivrotagsFixture
 */
class LivrotagsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_livro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'livro' => ['type' => 'index', 'columns' => ['id_livro'], 'length' => []],
            'tag' => ['type' => 'index', 'columns' => ['tag'], 'length' => []],
            'id_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'livrotags_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_livro'], 'references' => ['livros', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livrotags_ibfk_2' => ['type' => 'foreign', 'columns' => ['tag'], 'references' => ['tags', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livrotags_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id_livro' => 1,
                'tag' => 1,
                'id_user' => 1
            ],
        ];
        parent::init();
    }
}
