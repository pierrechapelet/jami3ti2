<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationIscedNarrowFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationIscedNarrowFieldsTable Test Case
 */
class EducationIscedNarrowFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationIscedNarrowFieldsTable
     */
    public $EducationIscedNarrowFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_isced_narrow_fields',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_field_of_study_subs',
        'app.applicant_desired_educations',
        'app.education_isced_detailed_fields',
        'app.applicant_educations',
        'app.institution_higher_education_courses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EducationIscedNarrowFields') ? [] : ['className' => 'App\Model\Table\EducationIscedNarrowFieldsTable'];
        $this->EducationIscedNarrowFields = TableRegistry::get('EducationIscedNarrowFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationIscedNarrowFields);

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
