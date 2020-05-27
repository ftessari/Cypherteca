<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroserieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroserieTable Test Case
 */
class LivroserieTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroserieTable
     */
    public $Livroserie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroserie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroserie') ? [] : ['className' => LivroserieTable::class];
        $this->Livroserie = TableRegistry::getTableLocator()->get('Livroserie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroserie);

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
