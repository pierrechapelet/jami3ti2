<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantTravelDocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantTravelDocumentsTable Test Case
 */
class ApplicantTravelDocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantTravelDocumentsTable
     */
    public $ApplicantTravelDocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_travel_documents',
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
        $config = TableRegistry::exists('ApplicantTravelDocuments') ? [] : ['className' => 'App\Model\Table\ApplicantTravelDocumentsTable'];
        $this->ApplicantTravelDocuments = TableRegistry::get('ApplicantTravelDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantTravelDocuments);

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
