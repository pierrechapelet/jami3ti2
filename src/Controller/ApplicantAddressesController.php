<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ApplicantAddresses Controller
 *
 * @property \App\Model\Table\ApplicantAddressesTable $ApplicantAddresses
 */
class ApplicantAddressesController extends AppController
{

    public function isAuthorized($user = null){
        // Only the owner can edit and view
        if (in_array($this->request->action, ['edit', 'view'])) {
            $applicantAddresseId = (int)$this->request->params['pass'][0];
            if ($this->ApplicantAddresses->isOwnedBy($applicantAddresseId, $user['id'])) {
                return true;
            }
        }
        // user can add if no applicantAdress exists already for that user
        if (in_array($this->request->action, ['add'])) {
            if($this->ApplicantAddresses->find('ownedBy', ['user_id' => $user['id']])->first() == null){
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
            'contain' => ['Users', 'Countries']
        ];
        $applicantAddresses = $this->paginate($this->ApplicantAddresses);

        $this->set(compact('applicantAddresses'));
        $this->set('_serialize', ['applicantAddresses']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicant Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantAddress = $this->ApplicantAddresses->get($id, [
            'contain' => ['Users', 'Countries']
        ]);

        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_address', $applicantAddress->user->id);
        $this->set('MenuItems', $ApplicantMenu);
        $this->set('applicantAddress', $applicantAddress);
        $this->set('_serialize', ['applicantAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userId = $this->Auth->user('id');
        $applicantAddress = $this->ApplicantAddresses->newEntity();
        if ($this->request->is('post')) {
            $applicantAddress = $this->ApplicantAddresses->patchEntity($applicantAddress, $this->request->data);
            $applicantAddress['user_id'] = $userId;
            if ($this->ApplicantAddresses->save($applicantAddress)) {
                $this->Flash->success(__('The record has been saved.'));
                return $this->redirect(['action' => 'view', $applicantAddress->id]);
            } else {
                $this->Flash->error(__('The record could not be saved. Please, try again.'));
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


        //$users = $this->ApplicantAddresses->Users->find('list', ['limit' => 200]);
        //$countries = $this->ApplicantAddresses->Countries->find('list', ['limit' => 200]);
        $this->set(compact('applicantAddress', 'users', 'countries'));
        $this->set('_serialize', ['applicantAddress']);

        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_address', $userId);
        $this->set('MenuItems', $ApplicantMenu);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userId = $this->Auth->user('id');
        $applicantAddress = $this->ApplicantAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantAddress = $this->ApplicantAddresses->patchEntity($applicantAddress, $this->request->data);
            $applicantAddress['user_id'] = $userId;
            if ($this->ApplicantAddresses->save($applicantAddress)) {
                $this->Flash->success(__('The record has been saved.'));
                return $this->redirect(['action' => 'view', $applicantAddress->id]);
            } else {
                $this->Flash->error(__('The record could not be saved. Please, try again.'));
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

        //$users = $this->ApplicantAddresses->Users->find('list', ['limit' => 200]);
        $countries = $this->ApplicantAddresses->Countries->find('list', ['limit' => 200]);
        $this->set(compact('applicantAddress', 'users', 'countries'));
        $this->set('_serialize', ['applicantAddress']);
        
        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_address', $user_id);
        $this->set('MenuItems', $ApplicantMenu);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantAddress = $this->ApplicantAddresses->get($id);
        if ($this->ApplicantAddresses->delete($applicantAddress)) {
            $this->Flash->success(__('The applicant address has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant address could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
