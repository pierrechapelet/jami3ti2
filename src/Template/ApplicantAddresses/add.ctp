<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'userProfile';

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;


//echo debug($applicantGeneral);


?>

<div class="applicantAddresses form large-9 medium-8 columns content">
    <?= $this->Form->create($applicantAddress) ?>
    <fieldset>
        <legend><?= __('Add_Applicant_Address') ?></legend>
        <?php
            echo $this->Form->input('addr_line1');
            echo $this->Form->input('addr_line2');
            echo $this->Form->input('addr_line3');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('country_id', ['options' => $countries]);
            echo $this->Form->input('postcode');
            echo $this->Form->input('phone_landline');
            echo $this->Form->input('phone_mobile');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
