<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationFieldOfStudySubsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationFieldOfStudySubsTable Test Case
 */
class EducationFieldOfStudySubsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationFieldOfStudySubsTable
     */
    public $EducationFieldOfStudySubs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_field_of_study_subs',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_isced_detailed_fields',
        'app.education_isced_narrow_fields',
        'app.applicant_desired_educations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EducationFieldOfStudySubs') ? [] : ['className' => 'App\Model\Table\EducationFieldOfStudySubsTable'];
        $this->EducationFieldOfStudySubs = TableRegistry::get('EducationFieldOfStudySubs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationFieldOfStudySubs);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
