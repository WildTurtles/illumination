<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemanticResponsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemanticResponsesTable Test Case
 */
class SemanticResponsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemanticResponsesTable
     */
    public $SemanticResponses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_responses',
        'app.languages',
        'app.semantic_requests',
        'app.categories',
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
        $config = TableRegistry::exists('SemanticResponses') ? [] : ['className' => 'App\Model\Table\SemanticResponsesTable'];
        $this->SemanticResponses = TableRegistry::get('SemanticResponses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SemanticResponses);

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
