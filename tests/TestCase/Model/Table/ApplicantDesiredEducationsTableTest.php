<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantDesiredEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantDesiredEducationsTable Test Case
 */
class ApplicantDesiredEducationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantDesiredEducationsTable
     */
    public $ApplicantDesiredEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_desired_educations',
        'app.users',
        'app.countries',
        'app.education_field_of_study_subs',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_isced_detailed_fields',
        'app.education_isced_narrow_fields',
        'app.applicant_educations',
        'app.institution_higher_education_courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantDesiredEducations') ? [] : ['className' => 'App\Model\Table\ApplicantDesiredEducationsTable'];
        $this->ApplicantDesiredEducations = TableRegistry::get('ApplicantDesiredEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantDesiredEducations);

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
