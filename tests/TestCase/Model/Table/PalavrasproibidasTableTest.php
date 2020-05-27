<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PalavrasproibidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PalavrasproibidasTable Test Case
 */
class PalavrasproibidasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PalavrasproibidasTable
     */
    public $Palavrasproibidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Palavrasproibidas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Palavrasproibidas') ? [] : ['className' => PalavrasproibidasTable::class];
        $this->Palavrasproibidas = TableRegistry::getTableLocator()->get('Palavrasproibidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Palavrasproibidas);

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
