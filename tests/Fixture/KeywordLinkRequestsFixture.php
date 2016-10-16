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
            'id' => 'c936bbf1-6e58-43d8-b346-5056fd2f50a7',
            'count' => 1,
            'keyword_id' => '15496900-a3f4-45f1-bb91-c52a27c5811c',
            'semantic_request_id' => 'cb99f77b-4293-4d09-8627-1514577b2a3e',
            'percentage' => 1.5,
            'created' => 1476659569,
            'updated' => 1476659569
        ],
    ];
}
