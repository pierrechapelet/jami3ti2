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


echo $this->Html->script('userProfileGeneral', ['block' => 'scriptBottom']);


?>



<div class="applicantGenerals form large-9 medium-8 columns content">
    <?= $this->Form->create($applicantGeneral) ?>
    <fieldset>
        <legend><?= __('Add Applicant General') ?></legend>
        <?php
            echo $this->Form->input('fisrtname', ['label' => ['text' => __('Fisrtname')]]);
            echo $this->Form->input('lastname', ['label' => ['text' => __('Lastname')]]);
            echo $this->Form->input('fathername', ['label' => ['text' => __('Fathername')]]);
            echo $this->Form->input('gender_id', ['options' => $genders, 'label' => ['text' => __('Gender')]]);
            echo $this->Form->input('birthdate', ['label' => ['text' => __('Birthdate')]]);
            echo $this->Form->input('nationality_id', [
                'options' => $countries,
                'label' => ['text' => __('Nationality')]
                ]);
            echo $this->Form->input('marital_status', ['options' => ['1' => __('Single'), '2' => __('Married'), '3' => __('Divorced')], 'label' => ['text' => __('Marital__Status')]]);
            echo $this->Form->input('dependants_count', ['label' => ['text' => __('Dependants Count')]]);
            echo $this->Form->input('has_disability', ['options' => ['0' => __('No'), '1' => __('Yes')], 'label' => ['text' => __('Has Disability')], 'id' => 'has_disability']);
        ?>
        <div id='disability_description'>
        <?php
            echo $this->Form->input('disability_description', ['label' => ['text' => __('Disability Description')]]);
        ?>
        </div>
        <?php  
            echo $this->Form->input('unhcr_nb', ['label' => ['text' => __('Unhcr Nb')]]);
            echo $this->Form->input('unrwa_nb', ['label' => ['text' => __('Unrwa Nb')]]);
            echo $this->Form->input('has_valid_passport', ['options' => ['0' => __('No'), '1' => __('Yes')], 'label' => ['text' => __('Has_Valid_National_Identity_Card')]]);
            echo $this->Form->input('has_valid_idcard', ['options' => ['0' => __('No'), '1' => __('Yes')], 'label' => ['text' => __('Has_Valid_National_Identity_Card')]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('btn_Submit')) ?>
    <?= $this->Form->end() ?>
</div>
