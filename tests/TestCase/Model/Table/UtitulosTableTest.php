<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UtitulosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UtitulosTable Test Case
 */
class UtitulosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UtitulosTable
     */
    public $Utitulos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Utitulos',
        'app.Usuarios',
        'app.Titulos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Utitulos') ? [] : ['className' => UtitulosTable::class];
        $this->Utitulos = TableRegistry::getTableLocator()->get('Utitulos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Utitulos);

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
