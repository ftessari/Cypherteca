<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MuralrespostasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MuralrespostasTable Test Case
 */
class MuralrespostasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MuralrespostasTable
     */
    public $Muralrespostas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Muralrespostas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Muralrespostas') ? [] : ['className' => MuralrespostasTable::class];
        $this->Muralrespostas = TableRegistry::getTableLocator()->get('Muralrespostas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Muralrespostas);

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
