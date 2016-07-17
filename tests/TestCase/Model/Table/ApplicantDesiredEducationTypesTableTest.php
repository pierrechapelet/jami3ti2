<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantDesiredEducationTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantDesiredEducationTypesTable Test Case
 */
class ApplicantDesiredEducationTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantDesiredEducationTypesTable
     */
    public $ApplicantDesiredEducationTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_desired_education_types',
        'app.users',
        'app.countries',
        'app.education_desired_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantDesiredEducationTypes') ? [] : ['className' => 'App\Model\Table\ApplicantDesiredEducationTypesTable'];
        $this->ApplicantDesiredEducationTypes = TableRegistry::get('ApplicantDesiredEducationTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantDesiredEducationTypes);

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
