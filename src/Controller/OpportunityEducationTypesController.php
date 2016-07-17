<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * OpportunityEducationTypes Controller
 *
 * @property \App\Model\Table\OpportunityEducationTypesTable $OpportunityEducationTypes
 */
class OpportunityEducationTypesController extends AppController
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
        $opportunityEducationType = $this->OpportunityEducationTypes->newEntity();
        if ($this->request->is('post')) {
            $opportunityEducationType = $this->OpportunityEducationTypes->patchEntity($opportunityEducationType, $this->request->data);
            $opportunityEducationType['opportunity_id'] = $opportunityId;
            if(!$this->OpportunityEducationTypes->alreadyExists($opportunityId, $opportunityEducationType['education_desired_type_id'] )) {
                if ($this->OpportunityEducationTypes->save($opportunityEducationType)) {
                    $this->Flash->success(__('The record has been saved.'));
                    return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityEducationType->opportunity_id]);
                } else {
                    $this->Flash->error(__('The record could not be saved. Please, try again.'));
                }
            } else {
                 $this->Flash->error(__('The record already exists. Please, try again.'));
            }
        }

        $educationDesiredTypes = $this->OpportunityEducationTypes->EducationDesiredTypes->find('list', ['limit' => 200]);
        $this->set(compact('opportunityEducationType', 'opportunities', 'educationDesiredTypes'));
        $this->set('_serialize', ['opportunityEducationType']);

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
     * @param string|null $id Opportunity Education Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunityEducationType = $this->OpportunityEducationTypes->get($id);
        if ($this->OpportunityEducationTypes->delete($opportunityEducationType)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityEducationType->opportunity_id]);
    }
}
