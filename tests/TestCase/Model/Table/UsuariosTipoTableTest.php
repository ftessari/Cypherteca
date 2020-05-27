<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosTipoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosTipoTable Test Case
 */
class UsuariosTipoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosTipoTable
     */
    public $UsuariosTipo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosTipo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosTipo') ? [] : ['className' => UsuariosTipoTable::class];
        $this->UsuariosTipo = TableRegistry::getTableLocator()->get('UsuariosTipo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosTipo);

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
