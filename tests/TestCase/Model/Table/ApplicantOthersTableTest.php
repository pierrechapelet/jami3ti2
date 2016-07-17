<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantOthersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantOthersTable Test Case
 */
class ApplicantOthersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantOthersTable
     */
    public $ApplicantOthers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_others',
        'app.users',
        'app.countries',
        'app.institution_higher_educations',
        'app.education_field_of_study_cores',
        'app.education_field_of_study_subs',
        'app.education_isced_narrow_fields',
        'app.applicant_educations',
        'app.education_levels',
        'app.languages',
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_courses',
        'app.education_isced_detailed_fields',
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
        $config = TableRegistry::exists('ApplicantOthers') ? [] : ['className' => 'App\Model\Table\ApplicantOthersTable'];
        $this->ApplicantOthers = TableRegistry::get('ApplicantOthers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantOthers);

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
