<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrolinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrolinksTable Test Case
 */
class LivrolinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrolinksTable
     */
    public $Livrolinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrolinks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrolinks') ? [] : ['className' => LivrolinksTable::class];
        $this->Livrolinks = TableRegistry::getTableLocator()->get('Livrolinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrolinks);

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
