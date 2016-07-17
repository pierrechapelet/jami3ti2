<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantDesiredCountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantDesiredCountriesTable Test Case
 */
class ApplicantDesiredCountriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantDesiredCountriesTable
     */
    public $ApplicantDesiredCountries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_desired_countries',
        'app.users',
        'app.countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantDesiredCountries') ? [] : ['className' => 'App\Model\Table\ApplicantDesiredCountriesTable'];
        $this->ApplicantDesiredCountries = TableRegistry::get('ApplicantDesiredCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantDesiredCountries);

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
