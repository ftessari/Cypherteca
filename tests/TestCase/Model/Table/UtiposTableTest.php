<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UtiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UtiposTable Test Case
 */
class UtiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UtiposTable
     */
    public $Utipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Utipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Utipos') ? [] : ['className' => UtiposTable::class];
        $this->Utipos = TableRegistry::getTableLocator()->get('Utipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Utipos);

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
