<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestForCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestForCommentsTable Test Case
 */
class RequestForCommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestForCommentsTable
     */
    public $RequestForComments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.request_for_comments',
        'app.http_status_codes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequestForComments') ? [] : ['className' => 'App\Model\Table\RequestForCommentsTable'];
        $this->RequestForComments = TableRegistry::get('RequestForComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequestForComments);

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
}
