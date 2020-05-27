<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UmailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UmailTable Test Case
 */
class UmailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UmailTable
     */
    public $Umail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Umail'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Umail') ? [] : ['className' => UmailTable::class];
        $this->Umail = TableRegistry::getTableLocator()->get('Umail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Umail);

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
