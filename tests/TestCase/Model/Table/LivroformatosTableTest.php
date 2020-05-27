<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroformatosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroformatosTable Test Case
 */
class LivroformatosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroformatosTable
     */
    public $Livroformatos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroformatos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroformatos') ? [] : ['className' => LivroformatosTable::class];
        $this->Livroformatos = TableRegistry::getTableLocator()->get('Livroformatos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroformatos);

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
