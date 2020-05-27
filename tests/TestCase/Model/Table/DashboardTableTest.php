<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DashboardTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DashboardTable Test Case
 */
class DashboardTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DashboardTable
     */
    public $Dashboard;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dashboard'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dashboard') ? [] : ['className' => DashboardTable::class];
        $this->Dashboard = TableRegistry::getTableLocator()->get('Dashboard', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dashboard);

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
