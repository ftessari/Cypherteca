<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuariosTitulosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuariosTitulosTable Test Case
 */
class UsuariosTitulosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuariosTitulosTable
     */
    public $UsuariosTitulos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.UsuariosTitulos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('UsuariosTitulos') ? [] : ['className' => UsuariosTitulosTable::class];
        $this->UsuariosTitulos = TableRegistry::getTableLocator()->get('UsuariosTitulos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsuariosTitulos);

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
