<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SemanticCocoonUrlsFixture
 *
 */
class SemanticCocoonUrlsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'id_url_visiblis' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'url' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'as_title' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'as_page' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'title_semantic_rank' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'page_semantic_rank' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'page_rank' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'http_status_code_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'semantic_cocoon_response_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fksemantic_c624354' => ['type' => 'foreign', 'columns' => ['http_status_code_id'], 'references' => ['http_status_codes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_c639501' => ['type' => 'foreign', 'columns' => ['semantic_cocoon_response_id'], 'references' => ['semantic_cocoon_responses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '3ffcfedd-4dd9-42fa-9a8c-0589836cf813',
            'id_url_visiblis' => 1,
            'url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'as_title' => 1.5,
            'as_page' => 1.5,
            'title_semantic_rank' => 1.5,
            'page_semantic_rank' => 1.5,
            'page_rank' => 1.5,
            'http_status_code_id' => 'c77bda3b-67ba-405e-85ec-179503f8430d',
            'semantic_cocoon_response_id' => 'c5bd66d6-e99b-49e0-b8c0-c52aab271935',
            'created' => 1483440527,
            'updated' => 1483440527
        ],
    ];
}
