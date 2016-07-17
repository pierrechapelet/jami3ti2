<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpportunityEducationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpportunityEducationsTable Test Case
 */
class OpportunityEducationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpportunityEducationsTable
     */
    public $OpportunityEducations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opportunity_educations',
        'app.opportunities',
        'app.opportunity_durations',
        'app.donation_campaign_providers',
        'app.donors',
        'app.donor_types',
        'app.countries',
        'app.users',
        'app.applicant_adresses',
        'app.applicant_desired_countries',
        'app.applicant_desired_educations',
        'app.education_field_of_study_subs',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_isced_detailed_fields',
        'app.education_isced_narrow_fields',
        'app.applicant_educations',
        'app.institution_higher_educations',
        'app.institution_types',
        'app.institution_higher_education_degrees',
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_courses',
        'app.education_levels',
        'app.languages',
        'app.applicant_languages',
        'app.applicant_desired_education_types',
        'app.education_desired_types',
        'app.applicant_generals',
        'app.genders',
        'app.nationalities',
        'app.applicant_nationalities',
        'app.applicant_travel_documents',
        'app.institutions_higher_educations',
        'app.opportunity_countries',
        'app.opportunity_applications',
        'app.opportunitity_application_statuses',
        'app.provider_offices',
        'app.providers',
        'app.provider_types',
        'app.provider_users',
        'app.provider_office_users',
        'app.provider_offices_with_opportunities',
        'app.opportunity_applicant_users',
        'app.donor_users',
        'app.donor_users',
        'app.applied_opportunities',
        'app.opportunity_scopes',
        'app.currencies',
        'app.donation_campaigns',
        'app.opportunity_education_types',
        'app.opportunity_institutions',
        'app.applied_countries',
        'app.applied_opportunites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpportunityEducations') ? [] : ['className' => 'App\Model\Table\OpportunityEducationsTable'];
        $this->OpportunityEducations = TableRegistry::get('OpportunityEducations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpportunityEducations);

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
