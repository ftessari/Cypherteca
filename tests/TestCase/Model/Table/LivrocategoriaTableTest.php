<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LivrocategoriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LivrocategoriaTable Test Case
 */
class LivrocategoriaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LivrocategoriaTable
     */
    public $Livrocategoria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Livrocategoria'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Livrocategoria') ? [] : ['className' => LivrocategoriaTable::class];
        $this->Livrocategoria = TableRegistry::getTableLocator()->get('Livrocategoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Livrocategoria);

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
