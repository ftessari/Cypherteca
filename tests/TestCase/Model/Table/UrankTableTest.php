<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UrankTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UrankTable Test Case
 */
class UrankTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UrankTable
     */
    public $Urank;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Urank'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Urank') ? [] : ['className' => UrankTable::class];
        $this->Urank = TableRegistry::getTableLocator()->get('Urank', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Urank);

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
