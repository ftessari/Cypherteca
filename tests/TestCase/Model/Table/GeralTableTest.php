<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GeralTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GeralTable Test Case
 */
class GeralTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GeralTable
     */
    public $Geral;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Geral'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Geral') ? [] : ['className' => GeralTable::class];
        $this->Geral = TableRegistry::getTableLocator()->get('Geral', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Geral);

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
