<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FaqsFixture
 *
 */
class FaqsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'question_en' => ['type' => 'string', 'length' => 400, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'question_ara' => ['type' => 'string', 'length' => 400, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'answer_en' => ['type' => 'string', 'length' => 2000, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'answer_ara' => ['type' => 'string', 'length' => 2000, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'link' => ['type' => 'string', 'length' => 400, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_active' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
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
            'question_en' => 'Lorem ipsum dolor sit amet',
            'question_ara' => 'Lorem ipsum dolor sit amet',
            'answer_en' => 'Lorem ipsum dolor sit amet',
            'answer_ara' => 'Lorem ipsum dolor sit amet',
            'link' => 'Lorem ipsum dolor sit amet',
            'is_active' => 1,
            'created' => '2016-07-02 10:13:06',
            'modified' => '2016-07-02 10:13:06'
        ],
    ];
}
