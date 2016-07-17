<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationFieldOfStudyCoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationFieldOfStudyCoresTable Test Case
 */
class EducationFieldOfStudyCoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationFieldOfStudyCoresTable
     */
    public $EducationFieldOfStudyCores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_field_of_study_subs',
        'app.education_isced_detailed_fields',
        'app.education_isced_narrow_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EducationFieldOfStudyCores') ? [] : ['className' => 'App\Model\Table\EducationFieldOfStudyCoresTable'];
        $this->EducationFieldOfStudyCores = TableRegistry::get('EducationFieldOfStudyCores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationFieldOfStudyCores);

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
