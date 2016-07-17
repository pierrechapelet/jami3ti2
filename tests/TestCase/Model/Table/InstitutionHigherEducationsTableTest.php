<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionHigherEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionHigherEducationsTable Test Case
 */
class InstitutionHigherEducationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionHigherEducationsTable
     */
    public $InstitutionHigherEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_degrees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstitutionHigherEducations') ? [] : ['className' => 'App\Model\Table\InstitutionHigherEducationsTable'];
        $this->InstitutionHigherEducations = TableRegistry::get('InstitutionHigherEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstitutionHigherEducations);

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