<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EducationIscedDetailedFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EducationIscedDetailedFieldsTable Test Case
 */
class EducationIscedDetailedFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EducationIscedDetailedFieldsTable
     */
    public $EducationIscedDetailedFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.education_isced_detailed_fields',
        'app.education_isced_narrow_fields',
        'app.education_field_of_study_cores',
        'app.applicant_others',
        'app.education_field_of_study_subs',
        'app.applicant_desired_educations',
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
        $config = TableRegistry::exists('EducationIscedDetailedFields') ? [] : ['className' => 'App\Model\Table\EducationIscedDetailedFieldsTable'];
        $this->EducationIscedDetailedFields = TableRegistry::get('EducationIscedDetailedFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EducationIscedDetailedFields);

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
