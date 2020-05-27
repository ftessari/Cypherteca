<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TitulosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TitulosTable Test Case
 */
class TitulosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TitulosTable
     */
    public $Titulos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Titulos',
        'app.Usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Titulos') ? [] : ['className' => TitulosTable::class];
        $this->Titulos = TableRegistry::getTableLocator()->get('Titulos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Titulos);

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
