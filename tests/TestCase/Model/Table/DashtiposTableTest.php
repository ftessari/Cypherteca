<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DashtiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DashtiposTable Test Case
 */
class DashtiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DashtiposTable
     */
    public $Dashtipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dashtipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dashtipos') ? [] : ['className' => DashtiposTable::class];
        $this->Dashtipos = TableRegistry::getTableLocator()->get('Dashtipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dashtipos);

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
