<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ProviderOffices Controller
 *
 * @property \App\Model\Table\ProviderOfficesTable $ProviderOffices
 */
class ProviderOfficesController extends AppController
{

    public function isAuthorized($user)
    {
        if (in_array($this->request->action, ['index'])) {
            $userId = (int)$this->request->params['pass'][0];
            if ($this->Auth->user('role') == 'provider' && $this->Auth->user('id') == $userId) {
                return true;
            }
        }

        if (in_array($this->request->action, ['viewProfile', 'editProfile'])) {
            $providerOfficeId = (int)$this->request->params['pass'][0];
            if ($this->Auth->user('role') == 'provider' && TableRegistry::get('ProviderOfficeUsers')->isOwnedBy($providerOfficeId, $this->Auth->user('id'))) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function viewProfile($id = null)
    {
        $providerOffice = $this->ProviderOffices->get($id, [
            'contain' => ['Providers', 'Countries']
        ]);

        $this->set('title', $providerOffice->name);
        $this->set('providerOffice', $providerOffice);
        $this->set('_serialize', ['providerOffice']);


        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_details', $id);
        $this->set('MenuItems', $ProviderOfficeMenu);
    }

    public function editProfile($id = null)
    {
        $providerOffice = $this->ProviderOffices->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $providerOffice = $this->ProviderOffices->patchEntity($providerOffice, $this->request->data);
            if ($this->ProviderOffices->save($providerOffice)) {
                $this->Flash->success(__('The record has been saved.'));
                return $this->redirect(['action' => 'viewProfile', $providerOffice->id]);
            } else {
                $this->Flash->error(__('The record could not be saved. Please, try again.'));
            }
        }
        $providers = $this->ProviderOffices->Providers->find('list', ['limit' => 200]);
        $countries = $this->ProviderOffices->Countries->find('list', ['limit' => 300]);
        $this->set('title', $providerOffice->name);
        $this->set(compact('providerOffice', 'providers', 'countries'));
        $this->set('_serialize', ['providerOffice']);

        $ProviderOfficeMenu = $this->MenuBuilder->buildProviderOfficeMenu('provider_office_details', $id);
        $this->set('MenuItems', $ProviderOfficeMenu);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Providers', 'Countries']
        ];
        $providerOffices = $this->paginate($this->ProviderOffices);

        $this->set(compact('providerOffices'));
        $this->set('_serialize', ['providerOffices']);
    }

    /**
     * View method
     *
     * @param string|null $id Provider Office id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $providerOffice = $this->ProviderOffices->get($id, [
            'contain' => ['Providers', 'Countries', 'Users', 'DonationCampaignProviders']
        ]);

        $this->set('providerOffice', $providerOffice);
        $this->set('_serialize', ['providerOffice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $providerOffice = $this->ProviderOffices->newEntity();
        if ($this->request->is('post')) {
            $providerOffice = $this->ProviderOffices->patchEntity($providerOffice, $this->request->data);
            if ($this->ProviderOffices->save($providerOffice)) {
                $this->Flash->success(__('The provider office has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider office could not be saved. Please, try again.'));
            }
        }
        $providers = $this->ProviderOffices->Providers->find('list', ['limit' => 200]);
        $countries = $this->ProviderOffices->Countries->find('list', ['limit' => 200]);
        $users = $this->ProviderOffices->Users->find('list', ['limit' => 200]);
        $this->set(compact('providerOffice', 'providers', 'countries', 'users'));
        $this->set('_serialize', ['providerOffice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider Office id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $providerOffice = $this->ProviderOffices->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $providerOffice = $this->ProviderOffices->patchEntity($providerOffice, $this->request->data);
            if ($this->ProviderOffices->save($providerOffice)) {
                $this->Flash->success(__('The provider office has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider office could not be saved. Please, try again.'));
            }
        }
        $providers = $this->ProviderOffices->Providers->find('list', ['limit' => 200]);
        $countries = $this->ProviderOffices->Countries->find('list', ['limit' => 200]);
        $users = $this->ProviderOffices->Users->find('list', ['limit' => 200]);
        $this->set(compact('providerOffice', 'providers', 'countries', 'users'));
        $this->set('_serialize', ['providerOffice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider Office id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $providerOffice = $this->ProviderOffices->get($id);
        if ($this->ProviderOffices->delete($providerOffice)) {
            $this->Flash->success(__('The provider office has been deleted.'));
        } else {
            $this->Flash->error(__('The provider office could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
