<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubtitulositeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubtitulositeTable Test Case
 */
class SubtitulositeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubtitulositeTable
     */
    public $Subtitulosite;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subtitulosite'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subtitulosite') ? [] : ['className' => SubtitulositeTable::class];
        $this->Subtitulosite = TableRegistry::getTableLocator()->get('Subtitulosite', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subtitulosite);

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
