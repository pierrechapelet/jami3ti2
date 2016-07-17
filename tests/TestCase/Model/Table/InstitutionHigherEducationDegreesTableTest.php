<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionHigherEducationDegreesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionHigherEducationDegreesTable Test Case
 */
class InstitutionHigherEducationDegreesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionHigherEducationDegreesTable
     */
    public $InstitutionHigherEducationDegrees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.institution_higher_education_degrees',
        'app.institution_higher_educations',
        'app.countries',
        'app.users',
        'app.institution_types',
        'app.applicant_educations',
        'app.education_levels',
        'app.education_isced_narrow_fields',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_field_of_study_subs',
        'app.applicant_desired_educations',
        'app.education_isced_detailed_fields',
        'app.institution_higher_education_courses',
        'app.languages',
        'app.institution_higher_education_faculties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstitutionHigherEducationDegrees') ? [] : ['className' => 'App\Model\Table\InstitutionHigherEducationDegreesTable'];
        $this->InstitutionHigherEducationDegrees = TableRegistry::get('InstitutionHigherEducationDegrees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstitutionHigherEducationDegrees);

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
