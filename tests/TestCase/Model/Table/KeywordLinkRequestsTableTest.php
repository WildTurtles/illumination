<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KeywordLinkRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KeywordLinkRequestsTable Test Case
 */
class KeywordLinkRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KeywordLinkRequestsTable
     */
    public $KeywordLinkRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.keyword_link_requests',
        'app.keywords',
        'app.semantic_requests',
        'app.categories',
        'app.languages',
        'app.corpuses',
        'app.accounts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('KeywordLinkRequests') ? [] : ['className' => 'App\Model\Table\KeywordLinkRequestsTable'];
        $this->KeywordLinkRequests = TableRegistry::get('KeywordLinkRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KeywordLinkRequests);

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
