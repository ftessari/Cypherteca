<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PontosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PontosTable Test Case
 */
class PontosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PontosTable
     */
    public $Pontos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pontos',
        'app.Usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pontos') ? [] : ['className' => PontosTable::class];
        $this->Pontos = TableRegistry::getTableLocator()->get('Pontos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pontos);

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
