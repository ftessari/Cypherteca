<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UpontosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UpontosTable Test Case
 */
class UpontosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UpontosTable
     */
    public $Upontos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Upontos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Upontos') ? [] : ['className' => UpontosTable::class];
        $this->Upontos = TableRegistry::getTableLocator()->get('Upontos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Upontos);

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
