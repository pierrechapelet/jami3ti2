<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantEducationsTable Test Case
 */
class ApplicantEducationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantEducationsTable
     */
    public $ApplicantEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_educations',
        'app.institution_higher_educations',
        'app.education_levels',
        'app.education_isced_narrow_fields',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_field_of_study_subs',
        'app.applicant_desired_educations',
        'app.users',
        'app.countries',
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
        $config = TableRegistry::exists('ApplicantEducations') ? [] : ['className' => 'App\Model\Table\ApplicantEducationsTable'];
        $this->ApplicantEducations = TableRegistry::get('ApplicantEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantEducations);

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
