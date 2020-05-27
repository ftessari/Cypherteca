<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LivrosFixture
 */
class LivrosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'titulo' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'subtitulo' => ['type' => 'string', 'length' => 300, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sinopse' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'ano' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'idioma' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'n_pag' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'editora' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ISBN' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'autor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'link_comp' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'categoria' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'serie' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'edicao' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'capa' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'categoria' => ['type' => 'index', 'columns' => ['categoria'], 'length' => []],
            'editora' => ['type' => 'index', 'columns' => ['editora'], 'length' => []],
            'idioma' => ['type' => 'index', 'columns' => ['idioma'], 'length' => []],
            'serie' => ['type' => 'index', 'columns' => ['serie'], 'length' => []],
            'autor' => ['type' => 'index', 'columns' => ['autor'], 'length' => []],
            'tipo' => ['type' => 'index', 'columns' => ['tipo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'livros_ibfk_2' => ['type' => 'foreign', 'columns' => ['editora'], 'references' => ['livroeditoras', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livros_ibfk_3' => ['type' => 'foreign', 'columns' => ['idioma'], 'references' => ['livroidioma', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livros_ibfk_4' => ['type' => 'foreign', 'columns' => ['serie'], 'references' => ['livroserie', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livros_ibfk_5' => ['type' => 'foreign', 'columns' => ['autor'], 'references' => ['livroautor', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livros_ibfk_6' => ['type' => 'foreign', 'columns' => ['tipo'], 'references' => ['livrotipos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'livros_ibfk_7' => ['type' => 'foreign', 'columns' => ['categoria'], 'references' => ['livrocategoria', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'titulo' => 'Lorem ipsum dolor sit amet',
                'subtitulo' => 'Lorem ipsum dolor sit amet',
                'sinopse' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'ano' => '2019-08-21',
                'idioma' => 1,
                'n_pag' => 1,
                'editora' => 1,
                'ISBN' => 1,
                'autor' => 1,
                'link_comp' => 'Lorem ipsum dolor sit amet',
                'categoria' => 1,
                'serie' => 1,
                'edicao' => 1,
                'tipo' => 1,
                'capa' => 'Lorem ip'
            ],
        ];
        parent::init();
    }
}
