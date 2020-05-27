<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrotiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrotiposTable Test Case
 */
class LivrotiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrotiposTable
     */
    public $Livrotipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrotipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrotipos') ? [] : ['className' => LivrotiposTable::class];
        $this->Livrotipos = TableRegistry::getTableLocator()->get('Livrotipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrotipos);

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
