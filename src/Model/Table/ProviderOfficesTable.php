<?php
namespace App\Model\Table;

use App\Model\Entity\ProviderOffice;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProviderOffices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Providers
 * @property \Cake\ORM\Association\BelongsTo $Countries
 * @property \Cake\ORM\Association\HasMany $DonationCampaignProviders
 * @property \Cake\ORM\Association\HasMany $ProviderOfficeUsers
 */
class ProviderOfficesTable extends Table
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

        $this->table('provider_offices');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('DonationCampaignProviders', [
            'foreignKey' => 'provider_office_id'
        ]);
        $this->hasMany('ProviderOfficeUsers', [
            'foreignKey' => 'provider_office_id'
        ]);

        $this->belongsToMany('Users', [
            'className' => 'Users',
            'foreignKey' => 'provider_office_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'provider_office_users',
            'propertyName' => 'users'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('addr_line1');

        $validator
            ->allowEmpty('addr_line2');

        $validator
            ->allowEmpty('addr_line3');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('postcode');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('fax');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->integer('is_active')
            ->allowEmpty('is_active');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        return $rules;
    }
    
    public function findOwnedBy(Query $query, array $options)
    {
        $userId = $options['user_id'];
        return $query->matching('ProviderOfficeUsers', function ($q)  use ($userId) {
            return $q->where(['ProviderOfficeUsers.user_id' => $userId]);
        });
    }

}
