<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\usuarios_mailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\usuarios_mailTable Test Case
 */
class usuarios_mailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\usuarios_mailTable
     */
    public $usuarios_mail;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('usuarios_mail') ? [] : ['className' => usuarios_mailTable::class];
        $this->usuarios_mail = TableRegistry::getTableLocator()->get('usuarios_mail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->usuarios_mail);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
