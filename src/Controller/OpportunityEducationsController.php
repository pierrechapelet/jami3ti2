<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * OpportunityEducations Controller
 *
 * @property \App\Model\Table\OpportunityEducationsTable $OpportunityEducations
 */
class OpportunityEducationsController extends AppController
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
        $opportunityEducation = $this->OpportunityEducations->newEntity();
        if ($this->request->is('post')) {
            $opportunityEducation = $this->OpportunityEducations->patchEntity($opportunityEducation, $this->request->data);
            $opportunityEducation['opportunity_id'] = $opportunityId;
            
            if(!$this->OpportunityEducations->alreadyExists($opportunityId, $opportunityEducation['education_field_of_study_sub_id'])) {
                if ($this->OpportunityEducations->save($opportunityEducation)) {
                    $this->Flash->success(__('The record has been saved.'));
                    return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityEducation->opportunity_id]);
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
            $educationFieldOfStudyCores = TableRegistry::get('EducationFieldOfStudyCores')->find('list', [
                'keyField' => 'id', 
                'valueField' => 'name_en', 
                'order' => array('name_en' => 'ASC')
                ])->toArray();
            $educationIscedNarrowFields = TableRegistry::get('EducationIscedNarrowFields')->find('list', [
                'keyField' => 'id', 
                'valueField' => 'name_en', 
                'order' => array('name_en' => 'ASC')
                ])->toArray();
        }
        else {
            $educationFieldOfStudyCores = TableRegistry::get('EducationFieldOfStudyCores')->find('list', [
                'keyField' => 'id',
                'valueField' => 'name_ara',
                'order' => array('name_ara' => 'ASC')
                ])->toArray();
            $educationIscedNarrowFields = TableRegistry::get('EducationIscedNarrowFields')->find('list', [
                'keyField' => 'id', 
                'valueField' => 'name_en', 
                'order' => array('name_en' => 'ASC')
                ])->toArray();
        }

        $educationFieldOfStudySubs = $this->OpportunityEducations->EducationFieldOfStudySubs->find('list', ['limit' => 200]);
        $this->set(compact('opportunityEducation', 'opportunities', 'educationFieldOfStudySubs', 'educationIscedNarrowFields', 'educationFieldOfStudyCores'));
        $this->set('_serialize', ['opportunityEducation']);

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
     * @param string|null $id Opportunity Education id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opportunityEducation = $this->OpportunityEducations->get($id);
        if ($this->OpportunityEducations->delete($opportunityEducation)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunityEducation->opportunity_id]);
    }
}
