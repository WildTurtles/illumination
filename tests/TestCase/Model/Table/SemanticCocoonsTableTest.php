<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemanticCocoonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemanticCocoonsTable Test Case
 */
class SemanticCocoonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemanticCocoonsTable
     */
    public $SemanticCocoons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.queue_elements',
        'app.semantic_cocoon_responses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SemanticCocoons') ? [] : ['className' => 'App\Model\Table\SemanticCocoonsTable'];
        $this->SemanticCocoons = TableRegistry::get('SemanticCocoons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SemanticCocoons);

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
