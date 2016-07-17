<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * ApplicantGenerals Controller
 *
 * @property \App\Model\Table\ApplicantGeneralsTable $ApplicantGenerals
 */
class ApplicantGeneralsController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event) {

    }


    public function isAuthorized($user = null){
        // Only the owner can edit and view
        if (in_array($this->request->action, ['edit', 'view'])) {
            $applicantGeneralId = (int)$this->request->params['pass'][0];
            if ($this->ApplicantGenerals->isOwnedBy($applicantGeneralId, $user['id'])) {
                return true;
            }
        }
        // user can add if no applicantGeneral exists already for that user
        if (in_array($this->request->action, ['add'])) {
            if($this->ApplicantGenerals->find('ownedBy', ['user_id' => $this->Auth->user('id')])->first() == null){
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
    //public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Genders', 'Countries']
    //     ];
    //     $applicantGenerals = $this->paginate($this->ApplicantGenerals);

    //     $this->set(compact('applicantGenerals'));
    //     $this->set('_serialize', ['applicantGenerals']);
    // }

    /**
     * View method
     *
     * @param string|null $id Applicant General id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null)
    {

        $applicantGeneral = $this->ApplicantGenerals->get($id, [
            'contain' => ['Users', 'Genders', 'Nationalities']
        ]);

        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_general', $applicantGeneral->user->id);
        $this->set('MenuItems', $ApplicantMenu);
        $this->set('applicantGeneral', $applicantGeneral);
        $this->set('_serialize', ['applicantGeneral']);

        $applicantTravelDocuments = TableRegistry::get('ApplicantTravelDocuments');
        $travelDocuments = $applicantTravelDocuments
            ->find()
            ->contain('Countries')
            ->where(['user_id' => $applicantGeneral->user->id]);
        $this->set('travelDocuments', $travelDocuments);        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        //$currentUserId = $this->Auth->User('id');
        $userId = $this->Auth->user('id');
        $applicantGeneral = $this->ApplicantGenerals->newEntity();
        if ($this->request->is('post')) {
            $applicantGeneral = $this->ApplicantGenerals->patchEntity($applicantGeneral, $this->request->data);
            $applicantGeneral['user_id'] = $userId;

            if ($applicantGeneral['has_disability'] == 0 ){
                $applicantGeneral['disability_description'] = null;
            } 

            if ($this->ApplicantGenerals->save($applicantGeneral)) {
                $this->Flash->success(__('The record has been saved.'));
                return $this->redirect(['action' => 'view', $applicantGeneral->id]);
            } else {
                $this->Flash->error(__('The record could not be saved. Please, try again.'));
            }
        }
        //$userId = $this->Auth->user('id') //ApplicantGenerals->Users->find('list', ['limit' => 200]);
        $genders = $this->ApplicantGenerals->Genders->find('list', ['limit' => 200]);
        
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

        //$countries = $this->ApplicantGenerals->Nationalities->find('list', ['limit' => 200]);
        $this->set(compact('applicantGeneral', 'users', 'genders', 'countries'));
        $this->set('_serialize', ['applicantGeneral']);

        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_general', $userId);
        $this->set('MenuItems', $ApplicantMenu);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicant General id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantGeneral = $this->ApplicantGenerals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantGeneral = $this->ApplicantGenerals->patchEntity($applicantGeneral, $this->request->data);
            $userId = $this->Auth->user('id');
            $applicantGeneral['user_id'] = $userId;

            if ($applicantGeneral['has_disability'] == 0 ){
                $applicantGeneral['disability_description'] = null;
            } 
            
            if ($this->ApplicantGenerals->save($applicantGeneral)) {
                $this->Flash->success(__('The record has been saved.'));
                return $this->redirect(['action' => 'view', $applicantGeneral->id]);
            } else {
                $this->Flash->error(__('The record could not be saved. Please, try again.'));
            }
        }
        //$users = $this->ApplicantGenerals->Users->find('list', ['limit' => 200]);
        $genders = $this->ApplicantGenerals->Genders->find('list', ['limit' => 200]);
        
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

        //$countries = $this->ApplicantGenerals->Nationalities->find('list', ['limit' => 200]);
        $this->set(compact('applicantGeneral', 'users', 'genders', 'countries'));
        $this->set('_serialize', ['applicantGeneral']);

        $ApplicantMenu = $this->MenuBuilder->buildApplicantMenu('applicant_menu_general', $applicantGeneral->user_id);
        $this->set('MenuItems', $ApplicantMenu);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicant General id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantGeneral = $this->ApplicantGenerals->get($id);
        if ($this->ApplicantGenerals->delete($applicantGeneral)) {
            $this->Flash->success(__('The record has been deleted.'));
        } else {
            $this->Flash->error(__('The record could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


}
