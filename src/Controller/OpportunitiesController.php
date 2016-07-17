<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Opportunities Controller
 *
 * @property \App\Model\Table\OpportunitiesTable $Opportunities
 */
class OpportunitiesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index','view']);
    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['viewProvider' ,'edit', 'delete'])) {
            $opportuntyId = (int)$this->request->params['pass'][0];

            $authorisedOpportunities = $this->Opportunities
                ->find('ownedBy',
                     ['user_id' => $this->Auth->user('id')])
                ->where(['Opportunities.id' => $opportuntyId])
                ->all();

            if ($this->Auth->user('role') == 'provider' && $authorisedOpportunities != null) {
                return true;
            }
        }
        if (in_array($this->request->action, ['add'])) {
            if ($this->Auth->user('role') == 'provider') {
                return true;
            }
        }


        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OpportunityDurations', 'DonationCampaignProviders', 'OpportunityScopes', 'Currencies']
        ];
        $opportunities = $this->paginate($this->Opportunities);

        $this->set(compact('opportunities'));
        $this->set('_serialize', ['opportunities']);
    }

    /**
     * View method
     *
     * @param string|null $id Opportunity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opportunity = $this->Opportunities->get($id, [
            'contain' => ['OpportunityDurations', 'DonationCampaignProviders', 'DonationCampaignProviders.ProviderOffices', 'OpportunityScopes', 'Currencies', 'Countries', 'Institutions', 'EducationTypes', 'EducationSubs', 'OpportunityApplications']
        ]);

        $this->set('opportunity', $opportunity);
        $this->set('_serialize', ['opportunity']);
    }


    public function viewProvider($id = null)
    {
        $opportunity = $this->Opportunities->get($id, [
            'contain' => [
                'OpportunityDurations',
                'DonationCampaignProviders',
                'DonationCampaignProviders.ProviderOffices',
                'DonationCampaignProviders.DonationCampaigns',
                'DonationCampaignProviders.DonationCampaigns.Donors',
                'OpportunityScopes',
                'OpportunityCountries',
                'OpportunityCountries.Countries',
                'OpportunityEducations',
                'OpportunityEducations.EducationFieldOfStudySubs',
                'OpportunityEducationTypes',
                'OpportunityEducationTypes.EducationDesiredTypes',
                'OpportunityInstitutions.InstitutionHigherEducations',
                'OpportunityInstitutions.InstitutionHigherEducations.Countries',
                'Currencies',
                'OpportunityApplications'
                ]
        ]);

        //debug($opportunity->toArray());

        $this->set('opportunity', $opportunity);
        $this->set('_serialize', ['opportunity']);


        $nbApplicantSeekers = TableRegistry::get('OpportunityApplications')->find()
            ->where(['opportunity_id' => $id])
            ->andWhere(['opportunitity_application_status_id' => 1])
            ->count();

        $nbApplicantAccepted = TableRegistry::get('OpportunityApplications')->find()
            ->Where(['opportunitity_application_status_id' => 2])
            ->orWhere(['opportunitity_application_status_id' => 4])
            ->andwhere(['opportunity_id' => $id])
            ->count();
            ;

        if ($opportunity->seats != null && $opportunity->seats != 0) {
            $percentage = $nbApplicantAccepted / $opportunity->seats * 100 ;
        } else {
            $percentage = 0 ;
        }

        $this->set('nbApplicantSeekers', $nbApplicantSeekers);
        $this->set('nbApplicantAccepted', $nbApplicantAccepted);
        $this->set('percentage', $percentage);
       
        $title = $opportunity->donation_campaign_provider->provider_office->name;
        $this->set('title', $title);
        
        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_opportunity_manager', $opportunity->donation_campaign_provider->provider_office_id);
        $this->set('MenuItems', $ProviderOfficeMenu);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($providerOfficeId)
    {
        $opportunity = $this->Opportunities->newEntity();
        if ($this->request->is('post')) {
            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);
            if ($this->Opportunities->save($opportunity)) {
                $this->Flash->success(__('The opportunity has been saved.'));
                return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunity->id]);
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }
        $opportunityDurations = $this->Opportunities->OpportunityDurations->find('list', ['limit' => 200]);
        $opportunityScopes = $this->Opportunities->OpportunityScopes->find('list', ['limit' => 200]);
        $currencies = $this->Opportunities->Currencies->find('list', ['limit' => 200]);


        $donationCampaignProviders = $this->Opportunities->DonationCampaignProviders->find()
            ->contain(['DonationCampaigns', 'DonationCampaigns.Donors'])
            ->where(['provider_office_id' => $providerOfficeId])
            ->map(function ($row) { // map() is a collection method, it executes the query
                    $row->trimmedTitle = $row->donation_campaign->name . ' - ' . $row->donation_campaign->donor->name;
                    return $row;
                })
            ->combine('id', 'trimmedTitle') // combine() is another collection method
            ->toArray(); // Also a collections library method

        $this->set(compact('opportunity', 'opportunityDurations', 'donationCampaignProviders', 'opportunityScopes', 'currencies'));
        $this->set('_serialize', ['opportunity']);


        $providerOffice = TableRegistry::get('ProviderOffices')->get($providerOfficeId);
        $this->set('title', $providerOffice->name);
        
        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_opportunity_manager', $providerOfficeId);
        $this->set('MenuItems', $ProviderOfficeMenu);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opportunity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opportunity = $this->Opportunities->get($id, [
            'contain' => ['DonationCampaignProviders', 'DonationCampaignProviders.ProviderOffices']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opportunity = $this->Opportunities->patchEntity($opportunity, $this->request->data);
            if ($this->Opportunities->save($opportunity)) {
                $this->Flash->success(__('The opportunity has been saved.'));
                return $this->redirect(['action' => 'viewProvider', $opportunity->id ]);
            } else {
                $this->Flash->error(__('The opportunity could not be saved. Please, try again.'));
            }
        }
        $opportunityDurations = $this->Opportunities->OpportunityDurations->find('list', ['limit' => 200]);
        $opportunityScopes = $this->Opportunities->OpportunityScopes->find('list', ['limit' => 200]);
        $currencies = $this->Opportunities->Currencies->find('list', ['limit' => 200]);
       
        $donationCampaignProviders = $this->Opportunities->DonationCampaignProviders->find()
            ->contain(['DonationCampaigns', 'DonationCampaigns.Donors'])
            ->where(['provider_office_id' => $opportunity->donation_campaign_provider->provider_office_id])
            ->map(function ($row) { // map() is a collection method, it executes the query
                    $row->trimmedTitle = $row->donation_campaign->name . ' - ' . $row->donation_campaign->donor->name;
                    return $row;
                })
            ->combine('id', 'trimmedTitle') // combine() is another collection method
            ->toArray(); // Also a collections library method

        $this->set(compact('opportunity', 'opportunityDurations', 'donationCampaignProviders', 'opportunityScopes', 'currencies'));
        $this->set('_serialize', ['opportunity']);

        $providerOffice = $opportunity->donation_campaign_provider->provider_office;
        $this->set('title', $providerOffice->name);
        
        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_opportunity_manager', $opportunity->donation_campaign_provider->provider_office_id);
        $this->set('MenuItems', $ProviderOfficeMenu);



    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunity = $this->Opportunities->get($id);
        if ($this->Opportunities->delete($opportunity)) {
            $this->Flash->success(__('The opportunity has been deleted.'));
        } else {
            $this->Flash->error(__('The opportunity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
