<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * OpportunityManager Controller
 *
 * @property \App\Model\Table\OpportunityManagerTable $OpportunityManager
 */
class OpportunityManagerController extends AppController
{


    public function isAuthorized($user = null){

        if (in_array($this->request->action, ['viewProviderOffice'])) {
            $providerOfficeId = (int)$this->request->params['pass'][0];
            if  ( TableRegistry::get('ProviderOfficeUsers')->isOwnedBy($providerOfficeId, ($this->Auth->user('id')))) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    public function viewProviderOffice($provider_office_id = null)
    {   
        $opportunities = TableRegistry::get('Opportunities')->find()
             ->contain(['OpportunityDurations',
                     'DonationCampaignProviders', 'DonationCampaignProviders.ProviderOffices',
                     'DonationCampaignProviders.DonationCampaigns',
                     'DonationCampaignProviders.DonationCampaigns.Donors',
                      'OpportunityScopes',
                      'Currencies'])
             ->matching('DonationCampaignProviders', function ($q) use ($provider_office_id) {
                 return $q->where(['DonationCampaignProviders.provider_office_id =' => $provider_office_id]);
             });

         //debug($opportunities->toArray());

        $this->set('opportunities', $opportunities);

        $ProviderOfficeName = TableRegistry::get('ProviderOffices')->find()
            ->select(['id', 'name'])
            ->where(['id' => $provider_office_id])
            ->first();
        $this->set('title', $ProviderOfficeName->name);

        $this->set('providerOfficeId', $provider_office_id );

        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_opportunity_manager', $provider_office_id);
        $this->set('MenuItems', $ProviderOfficeMenu);

        $this->render('view');
    }


}
