<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SemanticRequestsFixture
 *
 */
class SemanticRequestsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'count' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'category_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'field' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'request' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'block' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'language_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'corpus_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'account_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'semantic_requests_id' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'semantic_requests_name' => ['type' => 'index', 'columns' => ['name'], 'length' => []],
            'semantic_requests_category_id' => ['type' => 'index', 'columns' => ['category_id'], 'length' => []],
            'semantic_requests_language_id' => ['type' => 'index', 'columns' => ['language_id'], 'length' => []],
            'semantic_requests_corpus_id' => ['type' => 'index', 'columns' => ['corpus_id'], 'length' => []],
            'semantic_requests_account_id' => ['type' => 'index', 'columns' => ['account_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fksemantic_r122583' => ['type' => 'foreign', 'columns' => ['account_id'], 'references' => ['accounts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_r130721' => ['type' => 'foreign', 'columns' => ['language_id'], 'references' => ['languages', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_r667918' => ['type' => 'foreign', 'columns' => ['corpus_id'], 'references' => ['corpuses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_r688373' => ['type' => 'foreign', 'columns' => ['category_id'], 'references' => ['categories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '06be4954-4127-40f6-9868-6ff6adb9e7e0',
            'name' => 'Lorem ipsum dolor sit amet',
            'count' => 1,
            'category_id' => 'fd321f1a-b452-442f-ae58-6e77126740c9',
            'field' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'request' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'block' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'language_id' => 'e3db0827-e142-4446-bf09-743db7861e7a',
            'corpus_id' => 'af799981-4cd6-4bca-a7e5-a57c0eff16e8',
            'account_id' => '93d5feba-c966-4a8a-84ec-9bbcde76541a',
            'created' => 1476659144,
            'updated' => 1476659144
        ],
    ];
}
