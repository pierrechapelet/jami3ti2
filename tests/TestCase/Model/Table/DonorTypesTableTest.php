<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DonorTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DonorTypesTable Test Case
 */
class DonorTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DonorTypesTable
     */
    public $DonorTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.donor_types',
        'app.donors',
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
        'app.institution_higher_education_faculties',
        'app.institution_higher_education_degrees',
        'app.applicant_generals',
        'app.genders',
        'app.applicant_nationalities',
        'app.applicant_travel_documents',
        'app.institutions_higher_educations',
        'app.donation_campaigns',
        'app.currencies',
        'app.opportunity',
        'app.donor_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DonorTypes') ? [] : ['className' => 'App\Model\Table\DonorTypesTable'];
        $this->DonorTypes = TableRegistry::get('DonorTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DonorTypes);

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
