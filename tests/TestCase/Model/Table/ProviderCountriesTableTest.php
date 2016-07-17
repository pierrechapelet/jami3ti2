<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProviderCountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProviderCountriesTable Test Case
 */
class ProviderCountriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProviderCountriesTable
     */
    public $ProviderCountries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.provider_countries',
        'app.providers',
        'app.countries',
        'app.users',
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
        'app.opportunity',
        'app.donor_users',
        'app.institutions_higher_educations',
        'app.opportunity_countries',
        'app.opportunities',
        'app.opportunity_durations',
        'app.education_desired_types',
        'app.applicant_desired_education_types',
        'app.opportunity_scopes',
        'app.opportunity_applications',
        'app.applicant_users',
        'app.opportuntity_application_statuses',
        'app.provider_country_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProviderCountries') ? [] : ['className' => 'App\Model\Table\ProviderCountriesTable'];
        $this->ProviderCountries = TableRegistry::get('ProviderCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProviderCountries);

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
