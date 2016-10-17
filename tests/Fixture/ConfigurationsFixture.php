<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfigurationsFixture
 *
 */
class ConfigurationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'visiblis_api_key' => ['type' => 'string', 'length' => 48, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'ip' => ['type' => 'string', 'length' => 16, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'is_default' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'configurations_id' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'configurations_ip' => ['type' => 'index', 'columns' => ['ip'], 'length' => []],
            'configurations_default' => ['type' => 'index', 'columns' => ['is_default'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'configurations_name_key' => ['type' => 'unique', 'columns' => ['name'], 'length' => []],
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
            'id' => '9ed8e7f7-c5f9-4082-a142-48409a7e47b5',
            'name' => 'Lorem ipsum dolor sit amet',
            'visiblis_api_key' => 'Lorem ipsum dolor sit amet',
            'ip' => 'Lorem ipsum do',
            'is_default' => 1,
            'created' => 1476664767,
            'updated' => 1476664767
        ],
    ];
}
