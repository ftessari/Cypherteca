<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrocomentariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrocomentariosTable Test Case
 */
class LivrocomentariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrocomentariosTable
     */
    public $Livrocomentarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrocomentarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrocomentarios') ? [] : ['className' => LivrocomentariosTable::class];
        $this->Livrocomentarios = TableRegistry::getTableLocator()->get('Livrocomentarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrocomentarios);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
