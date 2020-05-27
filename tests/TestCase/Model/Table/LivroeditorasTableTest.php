<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroeditorasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroeditorasTable Test Case
 */
class LivroeditorasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroeditorasTable
     */
    public $Livroeditoras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroeditoras'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroeditoras') ? [] : ['className' => LivroeditorasTable::class];
        $this->Livroeditoras = TableRegistry::getTableLocator()->get('Livroeditoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroeditoras);

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
