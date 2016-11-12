<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemanticCocoonLinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemanticCocoonLinksTable Test Case
 */
class SemanticCocoonLinksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemanticCocoonLinksTable
     */
    public $SemanticCocoonLinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_cocoon_links',
        'app.semantic_cocoon_responses',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.queue_elements',
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
        $config = TableRegistry::exists('SemanticCocoonLinks') ? [] : ['className' => 'App\Model\Table\SemanticCocoonLinksTable'];
        $this->SemanticCocoonLinks = TableRegistry::get('SemanticCocoonLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SemanticCocoonLinks);

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
