<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantGeneralsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantGeneralsTable Test Case
 */
class ApplicantGeneralsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantGeneralsTable
     */
    public $ApplicantGenerals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_generals',
        'app.users',
        'app.countries',
        'app.unhcrs',
        'app.unrwas',
        'app.genders',
        'app.nationalities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantGenerals') ? [] : ['className' => 'App\Model\Table\ApplicantGeneralsTable'];
        $this->ApplicantGenerals = TableRegistry::get('ApplicantGenerals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantGenerals);

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
