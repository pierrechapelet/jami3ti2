<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\error\Debugger;

/**
 * Users Model
 *
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('username');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);

        $this->hasOne('ApplicantAdresses');
        $this->hasMany('ApplicantDesiredCountries');
        $this->hasMany('ApplicantDesiredEducations');
        $this->hasMany('ApplicantDesiredEducationTypes');
        $this->hasOne('ApplicantEducations');
        $this->hasOne('ApplicantGenerals');
        $this->hasMany('ApplicantLanguages');
        $this->hasMany('ApplicantNationalities');
        $this->hasOne('ApplicantOthers');
        $this->hasMany('ApplicantTravelDocuments');
        $this->hasMany('Donor_users');
        $this->belongsToMany('Donors', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'donor_id',
            'joinTable' => 'donor_users'
        ]);
        $this->hasMany('OpportunityApplications', [
            'foreignKey' => 'applicant_user_id',
        ]);
        $this->belongsToMany('AppliedOpportunities', [
            'className' => 'Opportunities',
            'foreignKey' => 'applicant_user_id',
            'targetForeignKey' => 'opportunity_id',
            'joinTable' => 'opportunity_applications',
            'propertyName' => 'applied_opportunities'
        ]);
        $this->belongsToMany('AppliedCountries', [
            'className' => 'Countries',
            'foreignKey' => 'applicant_user_id',
            'targetForeignKey' => 'country_id',
            'joinTable' => 'opportunity_applications',
            'propertyName' => 'applied_countries'
        ]);
        $this->hasMany('ProviderOfficeUsers');
        $this->belongsToMany('ProviderOffices', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'provider_office_id',
            'joinTable' => 'provider_office_users'
        ]);
        $this->hasMany('ProviderUsers');
        $this->belongsToMany('Providers', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'provider_id',
            'joinTable' => 'provider_users'
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
        return $validator
            ->notEmpty('username', __('username_required'))
            ->notEmpty('password', __('password_required'))
            ->notEmpty('role', __('role_required'))
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'applicant', 'provider']],
                'message' => 'Please enter a valid role'
            ])
            ->add('email', 'valid-email', ['rule' => 'email']);
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        return $rules;
    }


    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
        ->select(['id', 'username', 'password', 'role'])
        ->where(['Users.active' => 1]);

        return $query;
    }

}
