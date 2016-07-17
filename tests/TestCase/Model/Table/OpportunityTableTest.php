<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpportunityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpportunityTable Test Case
 */
class OpportunityTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpportunityTable
     */
    public $Opportunity;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opportunity',
        'app.opportunity_durations',
        'app.education_desired_types',
        'app.applicant_desired_education_types',
        'app.users',
        'app.countries',
        'app.applicant_desired_educations',
        'app.education_field_of_study_subs',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.institution_higher_educations',
        'app.institution_types',
        'app.applicant_educations',
        'app.education_levels',
        'app.education_isced_narrow_fields',
        'app.education_isced_detailed_fields',
        'app.institution_higher_education_courses',
        'app.institution_higher_education_faculities',
        'app.languages',
        'app.applicant_languages',
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_degrees',
        'app.applicant_generals',
        'app.genders',
        'app.applicant_nationalities',
        'app.applicant_travel_documents',
        'app.donors',
        'app.donor_types',
        'app.donation_campaigns',
        'app.currencies',
        'app.donor_users',
        'app.institutions_higher_educations',
        'app.providers',
        'app.opportunity_scopes',
        'app.opportunity_applications',
        'app.opportunity_countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Opportunity') ? [] : ['className' => 'App\Model\Table\OpportunityTable'];
        $this->Opportunity = TableRegistry::get('Opportunity', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Opportunity);

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
