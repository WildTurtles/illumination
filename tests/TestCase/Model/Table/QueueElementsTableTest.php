<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QueueElementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QueueElementsTable Test Case
 */
class QueueElementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QueueElementsTable
     */
    public $QueueElements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.queue_elements',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
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
        $config = TableRegistry::exists('QueueElements') ? [] : ['className' => 'App\Model\Table\QueueElementsTable'];
        $this->QueueElements = TableRegistry::get('QueueElements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QueueElements);

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
