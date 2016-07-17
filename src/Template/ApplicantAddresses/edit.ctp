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
        <?php
            echo $this->Form->input('addr_line1', ['label' => ['text' => __('Addr__Line1')]]);
            echo $this->Form->input('addr_line2', ['label' => ['text' => __('Addr__Line2')]]);
            echo $this->Form->input('addr_line3', ['label' => ['text' => __('Addr__Line3')]]);
            echo $this->Form->input('city', ['label' => ['text' => __('City')]]);
            echo $this->Form->input('state', ['label' => ['text' => __('State')]]);
            echo $this->Form->input('country_id', ['options' => $countries]);
            echo $this->Form->input('postcode', ['label' => ['text' => __('Postcode')]]);
            echo $this->Form->input('phone_landline', ['label' => ['text' => __('Phone__Landline')]]);
            echo $this->Form->input('phone_mobile', ['label' => ['text' => __('Phone__Mobile')]]);
            echo $this->Form->input('email', ['label' => ['text' => __('Email')]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
