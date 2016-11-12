<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HttpStatusCodesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HttpStatusCodesTable Test Case
 */
class HttpStatusCodesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HttpStatusCodesTable
     */
    public $HttpStatusCodes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.http_status_codes',
        'app.request_for_comments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HttpStatusCodes') ? [] : ['className' => 'App\Model\Table\HttpStatusCodesTable'];
        $this->HttpStatusCodes = TableRegistry::get('HttpStatusCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HttpStatusCodes);

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
