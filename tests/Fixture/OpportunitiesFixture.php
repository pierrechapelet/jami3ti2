<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OpportunitiesFixture
 *
 */
class OpportunitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name_en' => ['type' => 'string', 'length' => 400, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name_ara' => ['type' => 'string', 'length' => 400, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'description_en' => ['type' => 'string', 'length' => 2000, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'description_ara' => ['type' => 'string', 'length' => 2000, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'opportunity_duration_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'donation_campaign_provider_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'opportunity_scope_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'application_end_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'budget' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'currency_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'seats' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
            'id' => 1,
            'name_en' => 'Lorem ipsum dolor sit amet',
            'name_ara' => 'Lorem ipsum dolor sit amet',
            'description_en' => 'Lorem ipsum dolor sit amet',
            'description_ara' => 'Lorem ipsum dolor sit amet',
            'opportunity_duration_id' => 1,
            'donation_campaign_provider_id' => 1,
            'opportunity_scope_id' => 1,
            'application_end_date' => '2016-07-15',
            'budget' => 1,
            'currency_id' => 1,
            'seats' => 1,
            'created' => '2016-07-15 16:25:50',
            'modified' => '2016-07-15 16:25:50'
        ],
    ];
}
