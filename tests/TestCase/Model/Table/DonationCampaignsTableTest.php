<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonationCampaignsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonationCampaignsTable Test Case
 */
class DonationCampaignsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DonationCampaignsTable
     */
    public $DonationCampaigns;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.donation_campaigns',
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
        'app.opportunities',
        'app.opportunity_durations',
        'app.donation_campaign_providers',
        'app.opportunity_scopes',
        'app.currencies',
        'app.opportunity_applications',
        'app.opportunitity_application_statuses',
        'app.provider_offices',
        'app.providers',
        'app.provider_offices_with_opportunities',
        'app.opportunity_applicant_users',
        'app.donor_users',
        'app.donor_users',
        'app.applied_opportunities',
        'app.applied_countries',
        'app.applied_opportunites',
        'app.provider_office_users',
        'app.provider_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DonationCampaigns') ? [] : ['className' => 'App\Model\Table\DonationCampaignsTable'];
        $this->DonationCampaigns = TableRegistry::get('DonationCampaigns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DonationCampaigns);

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
