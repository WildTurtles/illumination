<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CocoonsCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CocoonsCategoriesTable Test Case
 */
class CocoonsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CocoonsCategoriesTable
     */
    public $CocoonsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cocoons_categories',
        'app.semantic_cocoons',
        'app.languages',
        'app.corpuses',
        'app.accounts',
        'app.queue_elements',
        'app.semantic_cocoon_responses',
        'app.semantic_cocoon_links',
        'app.semantic_cocoon_uniform_ressource_locators',
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
        $config = TableRegistry::exists('CocoonsCategories') ? [] : ['className' => 'App\Model\Table\CocoonsCategoriesTable'];
        $this->CocoonsCategories = TableRegistry::get('CocoonsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CocoonsCategories);

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
