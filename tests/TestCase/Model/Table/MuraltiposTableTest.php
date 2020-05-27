<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MuraltiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MuraltiposTable Test Case
 */
class MuraltiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MuraltiposTable
     */
    public $Muraltipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Muraltipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Muraltipos') ? [] : ['className' => MuraltiposTable::class];
        $this->Muraltipos = TableRegistry::getTableLocator()->get('Muraltipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Muraltipos);

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
