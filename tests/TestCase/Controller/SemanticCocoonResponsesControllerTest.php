<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SemanticCocoonResponsesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SemanticCocoonResponsesController Test Case
 */
class SemanticCocoonResponsesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semantic_cocoon_responses',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.queue_elements',
        'app.semantic_cocoon_links',
        'app.semantic_cocoon_uniform_ressource_locators',
        'app.http_status_codes',
        'app.request_for_comments'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
