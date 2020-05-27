<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosMailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosMailTable Test Case
 */
class UsuariosMailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosMailTable
     */
    public $UsuariosMail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosMail'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosMail') ? [] : ['className' => UsuariosMailTable::class];
        $this->UsuariosMail = TableRegistry::getTableLocator()->get('UsuariosMail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosMail);

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
