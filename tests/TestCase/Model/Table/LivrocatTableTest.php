<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrocatTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrocatTable Test Case
 */
class LivrocatTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrocatTable
     */
    public $Livrocat;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrocat'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrocat') ? [] : ['className' => LivrocatTable::class];
        $this->Livrocat = TableRegistry::getTableLocator()->get('Livrocat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrocat);

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
