<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemanticCocoonUrlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemanticCocoonUrlsTable Test Case
 */
class SemanticCocoonUrlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemanticCocoonUrlsTable
     */
    public $SemanticCocoonUrls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_cocoon_urls',
        'app.http_status_codes',
        'app.request_for_comments',
        'app.semantic_cocoon_responses',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.cocoons_categories',
        'app.queue_elements',
        'app.semantic_cocoon_links',
        'app.semantic_cocoon_uniform_ressource_locators'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SemanticCocoonUrls') ? [] : ['className' => 'App\Model\Table\SemanticCocoonUrlsTable'];
        $this->SemanticCocoonUrls = TableRegistry::get('SemanticCocoonUrls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SemanticCocoonUrls);

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
