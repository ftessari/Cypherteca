<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivroidiomaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivroidiomaTable Test Case
 */
class LivroidiomaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivroidiomaTable
     */
    public $Livroidioma;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livroidioma'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livroidioma') ? [] : ['className' => LivroidiomaTable::class];
        $this->Livroidioma = TableRegistry::getTableLocator()->get('Livroidioma', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livroidioma);

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
