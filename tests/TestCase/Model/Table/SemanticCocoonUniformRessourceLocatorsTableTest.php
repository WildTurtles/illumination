<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemanticCocoonUniformRessourceLocatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemanticCocoonUniformRessourceLocatorsTable Test Case
 */
class SemanticCocoonUniformRessourceLocatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemanticCocoonUniformRessourceLocatorsTable
     */
    public $SemanticCocoonUniformRessourceLocators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_cocoon_uniform_ressource_locators',
        'app.http_status_codes',
        'app.request_for_comments',
        'app.semantic_cocoon_responses',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.queue_elements',
        'app.semantic_cocoon_links'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SemanticCocoonUniformRessourceLocators') ? [] : ['className' => 'App\Model\Table\SemanticCocoonUniformRessourceLocatorsTable'];
        $this->SemanticCocoonUniformRessourceLocators = TableRegistry::get('SemanticCocoonUniformRessourceLocators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SemanticCocoonUniformRessourceLocators);

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
