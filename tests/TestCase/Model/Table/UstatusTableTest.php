<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UstatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UstatusTable Test Case
 */
class UstatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UstatusTable
     */
    public $Ustatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Ustatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ustatus') ? [] : ['className' => UstatusTable::class];
        $this->Ustatus = TableRegistry::getTableLocator()->get('Ustatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ustatus);

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
