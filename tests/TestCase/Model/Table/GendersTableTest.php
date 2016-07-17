<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GendersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GendersTable Test Case
 */
class GendersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GendersTable
     */
    public $Genders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.genders',
        'app.applicant_generals',
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
        'app.applicant_nationalities',
        'app.applicant_travel_documents',
        'app.donors',
        'app.donor_types',
        'app.donation_campaigns',
        'app.currencies',
        'app.opportunities',
        'app.opportunity_durations',
        'app.education_desired_types',
        'app.applicant_desired_education_types',
        'app.providers',
        'app.provider_types',
        'app.provider_offices',
        'app.opportunity_countries',
        'app.provider_office_users',
        'app.funding_donors',
        'app.doner_users',
        'app.opportunity',
        'app.donor_users',
        'app.implementing_providers',
        'app.provider_users',
        'app.donation_campaign_providers',
        'app.implemented_donation_campaigns',
        'app.implementing_provider_offices',
        'app.opportunity_scopes',
        'app.opportunity_applications',
        'app.opportuntity_application_statuses',
        'app.opportunity_applicant_users',
        'app.applicant_adresses',
        'app.applicant_desired_countries',
        'app.donor_users',
        'app.applied_opportunities',
        'app.opportunity_target_countries',
        'app.institutions_higher_educations',
        'app.provider_offices_with_opportunities',
        'app.applied_opportunites',
        'app.opportunity_provider_offices',
        'app.applied_countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Genders') ? [] : ['className' => 'App\Model\Table\GendersTable'];
        $this->Genders = TableRegistry::get('Genders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Genders);

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
}
