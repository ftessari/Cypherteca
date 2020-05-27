<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitasTable Test Case
 */
class VisitasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitasTable
     */
    public $Visitas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Visitas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Visitas') ? [] : ['className' => VisitasTable::class];
        $this->Visitas = TableRegistry::getTableLocator()->get('Visitas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Visitas);

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
