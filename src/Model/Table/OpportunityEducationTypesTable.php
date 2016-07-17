<?php
namespace App\Model\Table;

use App\Model\Entity\OpportunityEducationType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpportunityEducationTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Opportunities
 * @property \Cake\ORM\Association\BelongsTo $EducationDesiredTypes
 */
class OpportunityEducationTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('opportunity_education_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Opportunities', [
            'foreignKey' => 'opportunity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EducationDesiredTypes', [
            'foreignKey' => 'education_desired_type_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['opportunity_id'], 'Opportunities'));
        $rules->add($rules->existsIn(['education_desired_type_id'], 'EducationDesiredTypes'));
        return $rules;
    }

    public function alreadyExists($opportunityId, $educationDesiredType)
    {
        return $this->exists(['opportunity_id' => $opportunityId, 'education_desired_type_id' => $educationDesiredType]);
    }
}
