<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrotagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrotagsTable Test Case
 */
class LivrotagsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrotagsTable
     */
    public $Livrotags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrotags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrotags') ? [] : ['className' => LivrotagsTable::class];
        $this->Livrotags = TableRegistry::getTableLocator()->get('Livrotags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrotags);

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
