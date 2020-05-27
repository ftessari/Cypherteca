<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosRankTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosRankTable Test Case
 */
class UsuariosRankTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosRankTable
     */
    public $UsuariosRank;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosRank'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosRank') ? [] : ['className' => UsuariosRankTable::class];
        $this->UsuariosRank = TableRegistry::getTableLocator()->get('UsuariosRank', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosRank);

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
