<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivropontosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivropontosTable Test Case
 */
class LivropontosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivropontosTable
     */
    public $Livropontos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livropontos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livropontos') ? [] : ['className' => LivropontosTable::class];
        $this->Livropontos = TableRegistry::getTableLocator()->get('Livropontos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livropontos);

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
