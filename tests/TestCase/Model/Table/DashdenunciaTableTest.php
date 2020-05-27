<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DashdenunciaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DashdenunciaTable Test Case
 */
class DashdenunciaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DashdenunciaTable
     */
    public $Dashdenuncia;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dashdenuncia'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dashdenuncia') ? [] : ['className' => DashdenunciaTable::class];
        $this->Dashdenuncia = TableRegistry::getTableLocator()->get('Dashdenuncia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dashdenuncia);

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
