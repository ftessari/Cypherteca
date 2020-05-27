<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivroavaliacaoFixture
 */
class LivroavaliacaoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'livroavaliacao';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_livro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_user' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positivo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'negativo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_livro' => ['type' => 'index', 'columns' => ['id_livro'], 'length' => []],
            'id_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'livroavaliacao_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_livro'], 'references' => ['livros', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livroavaliacao_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['usuarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id_user' => 1,
                'positivo' => 1,
                'negativo' => 1
            ],
        ];
        parent::init();
    }
}
