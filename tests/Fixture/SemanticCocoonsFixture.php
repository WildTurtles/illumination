<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SemanticCocoonsFixture
 *
 */
class SemanticCocoonsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'count' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'url' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'request' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'clusters' => ['type' => 'integer', 'length' => 5, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'language_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'corpus_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'regular_expression' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'exclusive' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'account_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'cocoons_category_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fksemantic_c11824' => ['type' => 'foreign', 'columns' => ['corpus_id'], 'references' => ['corpuses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_c184775' => ['type' => 'foreign', 'columns' => ['language_id'], 'references' => ['languages', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_c558410' => ['type' => 'foreign', 'columns' => ['cocoons_category_id'], 'references' => ['cocoons_categories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fksemantic_c778677' => ['type' => 'foreign', 'columns' => ['account_id'], 'references' => ['accounts', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'd953cc50-223a-41cd-991a-dad2c559fe49',
            'name' => 'Lorem ipsum dolor sit amet',
            'count' => 1,
            'url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'request' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'clusters' => 1,
            'language_id' => '016a4e34-f140-4a42-832f-de675a641f4d',
            'corpus_id' => '76efb4dc-2ae7-4a84-a5b4-6419b7edc08c',
            'regular_expression' => 'Lorem ipsum dolor sit amet',
            'exclusive' => 1,
            'account_id' => '5ca70ee9-0a00-43a3-b0d4-90163b40f1d4',
            'created' => 1480951434,
            'updated' => 1480951434,
            'cocoons_category_id' => 'c3c864ec-99be-4d00-99a2-016dd2b9e4a0'
        ],
    ];
}
