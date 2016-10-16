<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorpusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorpusesTable Test Case
 */
class CorpusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorpusesTable
     */
    public $Corpuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.corpuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Corpuses') ? [] : ['className' => 'App\Model\Table\CorpusesTable'];
        $this->Corpuses = TableRegistry::get('Corpuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Corpuses);

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
