<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionHigherEducationCoursesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionHigherEducationCoursesTable Test Case
 */
class InstitutionHigherEducationCoursesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionHigherEducationCoursesTable
     */
    public $InstitutionHigherEducationCourses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.institution_higher_education_courses',
        'app.institution_higher_education_faculities',
        'app.education_isced_narrow_fields',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.users',
        'app.countries',
        'app.institution_higher_educations',
        'app.institution_types',
        'app.applicant_educations',
        'app.education_levels',
        'app.languages',
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_degrees',
        'app.education_field_of_study_subs',
        'app.applicant_desired_educations',
        'app.education_isced_detailed_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstitutionHigherEducationCourses') ? [] : ['className' => 'App\Model\Table\InstitutionHigherEducationCoursesTable'];
        $this->InstitutionHigherEducationCourses = TableRegistry::get('InstitutionHigherEducationCourses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstitutionHigherEducationCourses);

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
