<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QueueElementsFixture
 *
 */
class QueueElementsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'position' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'semantic_cocoon_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'queue_elements_position' => ['type' => 'unique', 'columns' => ['position'], 'length' => []],
            'fkqueue_elem644281' => ['type' => 'foreign', 'columns' => ['semantic_cocoon_id'], 'references' => ['semantic_cocoons', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 'b19c02e3-8abd-4f50-865c-240706548966',
            'position' => 1,
            'semantic_cocoon_id' => 'a4edae9f-6aaa-4da2-8514-d8c9af4e3bb4'
        ],
    ];
}
