<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TDomainsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TDomainsTable Test Case
 */
class TDomainsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TDomainsTable
     */
    public $TDomains;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.t_domains',
        'app.t_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TDomains') ? [] : ['className' => TDomainsTable::class];
        $this->TDomains = TableRegistry::getTableLocator()->get('TDomains', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TDomains);

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
