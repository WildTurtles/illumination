<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SemanticCocoonUrlsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SemanticCocoonUrlsController Test Case
 */
class SemanticCocoonUrlsControllerTest extends IntegrationTestCase
{

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
