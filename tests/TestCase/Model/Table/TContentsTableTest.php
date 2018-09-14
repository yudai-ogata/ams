<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TContentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TContentsTable Test Case
 */
class TContentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TContentsTable
     */
    public $TContents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.t_contents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TContents') ? [] : ['className' => TContentsTable::class];
        $this->TContents = TableRegistry::getTableLocator()->get('TContents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TContents);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
