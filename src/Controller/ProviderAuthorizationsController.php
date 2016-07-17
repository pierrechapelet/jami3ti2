<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Provider AUthorizations Controller
 *
 * 
 */
class ProviderAuthorizationsController extends AppController
{


    public function isAuthorized($user = null){

        if (in_array($this->request->action, ['index'])) {
            if  ($this->Auth->user('role') == 'provider') {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    public function index()
    {   
        // Should display all providers and provider offices for a given user
        $providers = TableRegistry::get('Providers')->find('ownedBy', ['user_id' => $this->Auth->user('id')]);
        $this->set(compact('providers'));
        $this->set('_serialize', ['providers']);

        // Should display all providers and provider offices for a given user
        $providerOffices = TableRegistry::get('ProviderOffices')->find('ownedBy', ['user_id' => $this->Auth->user('id')])->contain(['Countries']);
        $this->set(compact('providerOffices'));
        $this->set('_serialize', ['providerOffices']);


        $ProviderMenu = $this->MenuBuilder->BuildProviderUserMenu('provider_authorizations', $this->Auth->user('id'));
        $this->set('MenuItems', $ProviderMenu);
        //$this->render('index');
    }


}
