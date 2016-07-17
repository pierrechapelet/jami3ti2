<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationDesiredTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationDesiredTypesTable Test Case
 */
class EducationDesiredTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationDesiredTypesTable
     */
    public $EducationDesiredTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_desired_types',
        'app.applicant_desired_education_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EducationDesiredTypes') ? [] : ['className' => 'App\Model\Table\EducationDesiredTypesTable'];
        $this->EducationDesiredTypes = TableRegistry::get('EducationDesiredTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationDesiredTypes);

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
