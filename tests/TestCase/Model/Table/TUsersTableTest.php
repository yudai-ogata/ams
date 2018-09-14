<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TUsersTable Test Case
 */
class TUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TUsersTable
     */
    public $TUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.t_users',
        'app.t_domains'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TUsers') ? [] : ['className' => TUsersTable::class];
        $this->TUsers = TableRegistry::getTableLocator()->get('TUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TUsers);

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
