<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PesquisasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PesquisasTable Test Case
 */
class PesquisasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PesquisasTable
     */
    public $Pesquisas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pesquisas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pesquisas') ? [] : ['className' => PesquisasTable::class];
        $this->Pesquisas = TableRegistry::getTableLocator()->get('Pesquisas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pesquisas);

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
