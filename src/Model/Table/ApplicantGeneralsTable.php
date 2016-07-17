<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantGeneral;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantGenerals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Unhcrs
 * @property \Cake\ORM\Association\BelongsTo $Unrwas
 * @property \Cake\ORM\Association\BelongsTo $Genders
 * @property \Cake\ORM\Association\BelongsTo $Nationalities
 */
class ApplicantGeneralsTable extends Table
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

        $this->table('applicant_generals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Nationalities', [
            'className' => 'Countries',
            'foreignKey' => 'nationality_id',
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

        $validator
            ->requirePresence('fisrtname', 'create')
            ->notEmpty('fisrtname');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->requirePresence('fathername', 'create');

        $validator
            ->integer('unrwa_nb')
            ->allowEmpty('unrwa_nb');

        $validator
            ->integer('unhcr_nb')
            ->allowEmpty('unhcr_nb');

        $validator
            ->date('birthdate')
            ->requirePresence('birthdate', 'create')
            ->notEmpty('birthdate');

        $validator
            ->integer('marital_status')
            ->requirePresence('marital_status', 'create')
            ->notEmpty('marital_status');

        $validator
            ->integer('dependants_count')
            ->allowEmpty('dependants_count');

        $validator
            ->boolean('has_disability')
            ->requirePresence('has_disability', 'create')
            ->notEmpty('has_disability');

        $validator
            ->allowEmpty('unhcr_nb');

        $validator
            ->boolean('has_valid_passport')
            ->requirePresence('has_valid_passport', 'create')
            ->notEmpty('has_valid_passport');
       
       $validator
            ->boolean('has_valid_idcard')
            ->requirePresence('has_valid_passport', 'create')
            ->notEmpty('has_valid_passport');        

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['gender_id'], 'Genders'));
        $rules->add($rules->existsIn(['nationality_id'], 'Nationalities'));
        return $rules;
    }


    public function isOwnedBy($applicantGeneralId, $userId)
    {
        return $this->exists(['id' => $applicantGeneralId, 'user_id' => $userId]);
    }


    public function findOwnedBy(Query $query, array $options)
    {
        $userId = $options['user_id'];
        return $query->where(['user_id' => $userId]);
    }



}
