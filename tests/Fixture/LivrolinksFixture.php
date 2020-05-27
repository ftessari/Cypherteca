<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivrolinksFixture
 */
class LivrolinksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'link' => ['type' => 'string', 'length' => 300, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'idformato' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idlivro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'iduser' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dataenvio' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'n_downloads' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'livros_links_ibfk_1' => ['type' => 'index', 'columns' => ['idformato'], 'length' => []],
            'id_livro' => ['type' => 'index', 'columns' => ['idlivro'], 'length' => []],
            'id_user' => ['type' => 'index', 'columns' => ['iduser'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'livrolinks_ibfk_1' => ['type' => 'foreign', 'columns' => ['idformato'], 'references' => ['livroformatos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livrolinks_ibfk_2' => ['type' => 'foreign', 'columns' => ['idlivro'], 'references' => ['livros', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livrolinks_ibfk_3' => ['type' => 'foreign', 'columns' => ['iduser'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'link' => 'Lorem ipsum dolor sit amet',
                'idformato' => 1,
                'idlivro' => 1,
                'iduser' => 1,
                'dataenvio' => '2019-09-06 23:06:12',
                'n_downloads' => 1
            ],
        ];
        parent::init();
    }
}
