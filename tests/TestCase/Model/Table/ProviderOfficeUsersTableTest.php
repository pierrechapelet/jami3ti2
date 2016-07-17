<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProviderOfficeUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProviderOfficeUsersTable Test Case
 */
class ProviderOfficeUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProviderOfficeUsersTable
     */
    public $ProviderOfficeUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.provider_office_users',
        'app.provider_offices',
        'app.providers',
        'app.provider_types',
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
        'app.donors',
        'app.donor_types',
        'app.donation_campaign_providers',
        'app.donation_campaigns',
        'app.currencies',
        'app.opportunities',
        'app.opportunity_durations',
        'app.opportunity_scopes',
        'app.opportunity_applications',
        'app.opportunitity_application_statuses',
        'app.opportunity_countries',
        'app.donor_users',
        'app.institutions_higher_educations',
        'app.provider_offices_with_opportunities',
        'app.opportunity_applicant_users',
        'app.donor_users',
        'app.applied_opportunities',
        'app.applied_countries',
        'app.applied_opportunites',
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
        $config = TableRegistry::exists('ProviderOfficeUsers') ? [] : ['className' => 'App\Model\Table\ProviderOfficeUsersTable'];
        $this->ProviderOfficeUsers = TableRegistry::get('ProviderOfficeUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProviderOfficeUsers);

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
