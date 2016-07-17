<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantAddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantAddressesTable Test Case
 */
class ApplicantAddressesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantAddressesTable
     */
    public $ApplicantAddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_addresses',
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
        $config = TableRegistry::exists('ApplicantAddresses') ? [] : ['className' => 'App\Model\Table\ApplicantAddressesTable'];
        $this->ApplicantAddresses = TableRegistry::get('ApplicantAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantAddresses);

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
