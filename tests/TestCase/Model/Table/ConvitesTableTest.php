<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConvitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConvitesTable Test Case
 */
class ConvitesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConvitesTable
     */
    public $Convites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Convites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Convites') ? [] : ['className' => ConvitesTable::class];
        $this->Convites = TableRegistry::getTableLocator()->get('Convites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Convites);

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
