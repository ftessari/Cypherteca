<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroavaliacaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroavaliacaoTable Test Case
 */
class LivroavaliacaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroavaliacaoTable
     */
    public $Livroavaliacao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroavaliacao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroavaliacao') ? [] : ['className' => LivroavaliacaoTable::class];
        $this->Livroavaliacao = TableRegistry::getTableLocator()->get('Livroavaliacao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroavaliacao);

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
