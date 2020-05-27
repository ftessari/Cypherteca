<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroautorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroautorTable Test Case
 */
class LivroautorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroautorTable
     */
    public $Livroautor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroautor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroautor') ? [] : ['className' => LivroautorTable::class];
        $this->Livroautor = TableRegistry::getTableLocator()->get('Livroautor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroautor);

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
