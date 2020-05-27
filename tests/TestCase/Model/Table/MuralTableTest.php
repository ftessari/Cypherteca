<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MuralTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MuralTable Test Case
 */
class MuralTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MuralTable
     */
    public $Mural;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Mural'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Mural') ? [] : ['className' => MuralTable::class];
        $this->Mural = TableRegistry::getTableLocator()->get('Mural', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mural);

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
