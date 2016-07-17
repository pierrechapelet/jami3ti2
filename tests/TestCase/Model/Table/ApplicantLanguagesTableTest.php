<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantLanguagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantLanguagesTable Test Case
 */
class ApplicantLanguagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantLanguagesTable
     */
    public $ApplicantLanguages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicant_languages',
        'app.users',
        'app.countries',
        'app.languages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantLanguages') ? [] : ['className' => 'App\Model\Table\ApplicantLanguagesTable'];
        $this->ApplicantLanguages = TableRegistry::get('ApplicantLanguages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantLanguages);

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
