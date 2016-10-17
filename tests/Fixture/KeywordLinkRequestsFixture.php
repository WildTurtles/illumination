<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KeywordLinkRequestsFixture
 *
 */
class KeywordLinkRequestsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'count' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'keyword_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'semantic_request_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'percentage' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fkkeyword_li258132' => ['type' => 'foreign', 'columns' => ['semantic_request_id'], 'references' => ['semantic_requests', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fkkeyword_li745121' => ['type' => 'foreign', 'columns' => ['keyword_id'], 'references' => ['keywords', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'da307812-22eb-452c-8e6b-b6a5862bf6b5',
            'count' => 1,
            'keyword_id' => 'a1ed33a5-ed03-46a2-aa4f-adb18a38c224',
            'semantic_request_id' => 'e9f3da52-2a9c-462e-b7a8-af3d40507aa2',
            'percentage' => 1.5,
            'created' => 1476665817,
            'updated' => 1476665817
        ],
    ];
}
