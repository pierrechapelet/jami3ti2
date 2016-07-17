<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantNationalitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantNationalitiesTable Test Case
 */
class ApplicantNationalitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantNationalitiesTable
     */
    public $ApplicantNationalities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_nationalities',
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
        $config = TableRegistry::exists('ApplicantNationalities') ? [] : ['className' => 'App\Model\Table\ApplicantNationalitiesTable'];
        $this->ApplicantNationalities = TableRegistry::get('ApplicantNationalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantNationalities);

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
