<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DashsolicitacaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DashsolicitacaoTable Test Case
 */
class DashsolicitacaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DashsolicitacaoTable
     */
    public $Dashsolicitacao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dashsolicitacao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dashsolicitacao') ? [] : ['className' => DashsolicitacaoTable::class];
        $this->Dashsolicitacao = TableRegistry::getTableLocator()->get('Dashsolicitacao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dashsolicitacao);

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
