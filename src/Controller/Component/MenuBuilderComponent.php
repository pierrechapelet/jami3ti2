<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class MenuBuilderComponent extends Component
{
    public function buildMainMenu()
    {
    	$mainMenu = [];

    	$session = $this->request->session();

    	// If a user exists, provide a custom menu 
    	if ($session->check('Auth.User.role')){
    		
    		$role = $session->read('Auth.User.role');

    		$mainMenu = [
	          'navbar_countries' => [
	            'url' => ['plugin' => false, 'controller' => 'Countries', 'action' => 'listCountryPages']
	          ],
	          'navbar_opportunities' => [
	            'url' => ['plugin' => false, 'controller' => 'Opportunities', 'action' => 'index']
	          ],
	          'navbar_faqs' => [
	            'url' => ['plugin' => false, 'controller' => 'Faqs/index', 'action' => 'fags']
	          ],
	          'navbar_contact' => [
	            'url' => ['plugin' => false, 'controller' => 'Pages', 'action' => 'contact']
	          ],
	          'navbar_about' => [
	            'url' => ['plugin' => false, 'controller' => 'Pages', 'action' => 'about']
	          ]
	        ];
    	}
    	// Else, provide the default menu
    	else {

    		$mainMenu = [
	          'navbar_countries' => [
	            'url' => ['plugin' => false, 'controller' => 'Countries', 'action' => 'listCountryPages']
	          ],
	          'navbar_opportunities' => [
	            'url' => ['plugin' => false, 'controller' => 'Opportunities', 'action' => 'index']
	          ],
	          'navbar_faqs' => [
	            'url' => ['plugin' => false, 'controller' => 'Faqs/index', 'action' => 'fags']
	          ],
	          'navbar_contact' => [
	            'url' => ['plugin' => false, 'controller' => 'Pages', 'action' => 'contact']
	          ],
	          'navbar_about' => [
	            'url' => ['plugin' => false, 'controller' => 'Pages', 'action' => 'about']
	          ]
	        ];

    	}

        return $mainMenu;
    }

    public function buildMyProfileMenu()
    {
    	$myProfileMenu = [];

    	$session = $this->request->session();

    	// If a user exists, provide a custom menu 
    	if ($session->check('Auth.User.role')){

    		$role = $session->read('Auth.User.role');
    		$user_id = $session->read('Auth.User.id');

    		switch ($role) {
    			//
    			//	ADMIN ROLE
    			//
			    case 'admin':
			    	$myProfileMenu = [
					  'navbar_my_profile' => [
					    'url' => ['plugin' => false, 'controller' => 'About', 'action' => 'index'], 
					    'icon' => 'fa-info-circle'
					  ],
					  '_divider',
					  'navbar_logout' => [
					    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'logout'],
					    'icon' => 'fa-power-off'
					  ]
					];
			        
			        break;
    			//
    			//	APPLICANT ROLE
    			//
			    case 'applicant':
			    	$myProfileMenu = [
					  'navbar_my_profile' => [
					    'url' => [
					    	'plugin' => false,
					    	'controller' => 'Users', 
					    	'action' => 'viewApplicant',
					    	 $session->read('Auth.User.id')], 
					    'icon' => 'fa-info-circle'
					  ],
					  '_divider',
					  'navbar_logout' => [
					    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'logout'],
					    'icon' => 'fa-power-off'
					    ]
					];
			        break;

    			//
    			//	PROVIDER ROLE
    			//
			    case 'provider':
			    	$myProfileMenu = [
					  'navbar_provider_profile' => [
					    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'viewProvider', $user_id], 
					    'icon' => 'fa-info-circle'
					  ],
					  '_divider',
					  'navbar_logout' => [
					    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'logout'],
					    'icon' => 'fa-power-off'
					  
					    ]
					];
			        
			        break;

			    case 'donor':
			    	$myProfileMenu = [
					  'navbar_my_profile' => [
					    'url' => ['plugin' => false, 'controller' => 'About', 'action' => 'index'], 
					    'icon' => 'fa-info-circle'
					  ],
					  '_divider',
					  'navbar_logout' => [
					    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'logout'],
					    'icon' => 'fa-power-off'
					  ]
					];
			        
			        break;

			}
    	}
    	
        return $myProfileMenu;
    }

    public function buildApplicantMenu($selectedMenuItem = 'applicant_menu_overview', $userId)
    {
    	$myApplicantMenu = [];

        $myApplicantMenu['applicant_menu_account'] = [
			    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'viewApplicant', $userId],
			    'class' => ''
			  ]; 

    	$applicantGenerals = TableRegistry::get('ApplicantGenerals');
        $applicantGeneral = $applicantGenerals
            ->find()
            ->where(['user_id' => $userId])
            ->first();
        if($applicantGeneral){
        	$myApplicantMenu['applicant_menu_general'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantGenerals', 'action' => 'view', $applicantGeneral->id],
					    'class' => ''
					  ];
        } else {
        	$myApplicantMenu['applicant_menu_general'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantGenerals', 'action' => 'add'],
					    'class' => ''
					  ];        	
        }

        $applicantAddresses = TableRegistry::get('ApplicantAddresses');
        $applicantAddress = $applicantAddresses
            ->find()
            ->where(['user_id' => $userId])
            ->first();
        if($applicantAddress){
        	$myApplicantMenu['applicant_menu_address'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantAddresses', 'action' => 'view', $applicantAddress->id],
					    'class' => ''
					  ];
        } else {
        	$myApplicantMenu['applicant_menu_address'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantAddresses', 'action' => 'add'],
					    'class' => ''
					  ];        	
        }

        $applicantEducations = TableRegistry::get('ApplicantEducations');
        $applicantEducation = $applicantEducations
            ->find()
            ->where(['user_id' => $userId])
            ->first();
        if($applicantEducation){
        	$myApplicantMenu['applicant_menu_education'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantEducations', 'action' => 'view', $applicantEducation->id],
					    'class' => ''
					  ];
        } else {
        	$myApplicantMenu['applicant_menu_education'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantEducations', 'action' => 'add'],
					    'class' => ''
					  ];        	
        }


        $myApplicantMenu['applicant_menu_education_needs'] = [
			    'url' => ['plugin' => false, 'controller' => 'ApplicantEducationNeeds', 'action' => 'view', $userId],
			    'class' => ''
			  ];

        $applicantOthers = TableRegistry::get('ApplicantOthers');
        $applicantOther = $applicantOthers
            ->find()
            ->where(['user_id' => $userId])
            ->first();
        if($applicantOther){
        	$myApplicantMenu['applicant_menu_other'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantOthers', 'action' => 'view', $applicantOther->id],
					    'class' => ''
					  ];
        } else {
        	$myApplicantMenu['applicant_menu_other'] = [
					    'url' => ['plugin' => false, 'controller' => 'ApplicantOthers', 'action' => 'add'],
					    'class' => ''
					  ];        	
        }

    	$myApplicantMenu[$selectedMenuItem]['class'] = 'active';

        return $myApplicantMenu;
    }

public function buildProviderUserMenu($selectedMenuItem = 'provider_menu_account', $userId)
    {
    	$myProviderMenu = [];

        $myProviderMenu['provider_menu_account'] = [
			    'url' => ['plugin' => false, 'controller' => 'Users', 'action' => 'viewProvider', $userId],
			    'class' => ''
			  ]; 


		$myProviderMenu['provider_authorizations'] = [
			    'url' => ['plugin' => false, 'controller' => 'ProviderAuthorizations', 'action' => 'index', $userId],
			    'class' => ''
			  ]; 

    	$myProviderMenu[$selectedMenuItem]['class'] = 'active';

        return $myProviderMenu;
    }


public function buildProviderOfficeMenu($selectedMenuItem = 'provider_office_details', $providerOfficeId)
    {
    	$myProviderMenu = [];

        $myProviderMenu['provider_office_details'] = [
			    'url' => ['plugin' => false, 'controller' => 'ProviderOffices', 'action' => 'viewProfile', $providerOfficeId],
			    'class' => ''
			  ]; 

        $myProviderMenu['provider_office_opportunity_manager'] = [
			    'url' => ['plugin' => false, 'controller' => 'OpportunityManager', 'action' => 'viewProviderOffice', $providerOfficeId],
			    'class' => ''
			  ]; 


    	$myProviderMenu[$selectedMenuItem]['class'] = 'active';

        return $myProviderMenu;
    }

}







