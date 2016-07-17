<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * OpportunityInstitutions Controller
 *
 * @property \App\Model\Table\OpportunityInstitutionsTable $OpportunityInstitutions
 */
class OpportunityInstitutionsController extends AppController
{


    public function isAuthorized($user = null){
        if (in_array($this->request->action, ['delete'])) {
            if ($this->Auth->user('role') == 'provider') {
                return true;
            }
        }

        if (in_array($this->request->action, ['add']) && $this->Auth->user('role') == 'provider') {
            return true;
        }
        return parent::isAuthorized($user);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($opportunityId)
    {
        $opportunityInstitution = $this->OpportunityInstitutions->newEntity();
        if ($this->request->is('post')) {
            $opportunityInstitution = $this->OpportunityInstitutions->patchEntity($opportunityInstitution, $this->request->data);
            $opportunityInstitution['opportunity_id'] = $opportunityId;
            if (!$this->OpportunityInstitutions->alreadyExists($opportunityId, $opportunityInstitution['institution_higher_education_id'])) {
                if ($this->OpportunityInstitutions->save($opportunityInstitution)) {
                    $this->Flash->success(__('The record has been saved.'));
                    return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityInstitution->opportunity_id]);
                } else {
                    $this->Flash->error(__('The record could not be saved. Please, try again.'));
                }
            } else {
                 $this->Flash->error(__('The record already exists. Please, try again.'));
            }
        }

        $session = $this->request->session();
        $lang = $session->read('System.language.code');
        if ($lang == 'en_US'){
            $countries = TableRegistry::get('Countries')->find('list', [
                'keyField' => 'id', 
                'valueField' => 'name_en', 
                'order' => array('name_en' => 'ASC')
                ])->toArray();
        }
        else {
            $countries = TableRegistry::get('Countries')->find('list', [
                'keyField' => 'id',
                'valueField' => 'name_ara',
                'order' => array('name_ara' => 'ASC')
                ])->toArray();
        }


        $institutionHigherEducations = $this->OpportunityInstitutions->InstitutionHigherEducations->find('list', ['limit' => 200]);
        $this->set(compact('opportunityInstitution', 'opportunities', 'institutionHigherEducations', 'countries'));
        $this->set('_serialize', ['opportunityInstitution']);
        
        $opportunity = TableRegistry::get('Opportunities')->get($opportunityId, [
                'contain' => ['DonationCampaignProviders', 'DonationCampaignProviders.ProviderOffices']
                ]);

        $this->set('opportunity', $opportunity);
        $title = $opportunity->donation_campaign_provider->provider_office->name;
        $this->set('title', $title);
        
        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_opportunity_manager', $opportunity->donation_campaign_provider->provider_office_id);
        $this->set('MenuItems', $ProviderOfficeMenu);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opportunity Institution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunityInstitution = $this->OpportunityInstitutions->get($id);
        if ($this->OpportunityInstitutions->delete($opportunityInstitution)) {
           $this->Flash->success(__('The record has been deleted.'));
        } else {
           $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityInstitution->opportunity_id]);
    }
}
