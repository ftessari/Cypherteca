<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosStatusTable Test Case
 */
class UsuariosStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosStatusTable
     */
    public $UsuariosStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosStatus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosStatus') ? [] : ['className' => UsuariosStatusTable::class];
        $this->UsuariosStatus = TableRegistry::getTableLocator()->get('UsuariosStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosStatus);

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
