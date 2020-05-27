<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusTable Test Case
 */
class StatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusTable
     */
    public $Status;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Status',
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
        $config = TableRegistry::getTableLocator()->exists('Status') ? [] : ['className' => StatusTable::class];
        $this->Status = TableRegistry::getTableLocator()->get('Status', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Status);

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
