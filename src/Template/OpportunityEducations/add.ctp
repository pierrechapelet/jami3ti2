<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'providerProfile';

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

//echo debug($applicantDesiredEducations);
echo $this->Html->script('userProfileDesiredEducationAdd', ['block' => 'scriptBottom']);

?>

<div class="opportunityEducations form large-9 medium-8 columns content">
    <?= $this->Form->create($opportunityEducation) ?>
    <fieldset>
        <legend><?= __('Add Opportunity Education') 
                     . ' ' . __('to') . ' ' .
                      $this->Html->link($opportunity->name_en, ['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunity->id])?></legend>
        <?php
            // Those 2 fields are used only for javascript cascade select.
            echo $this->Form->input('education_field_of_study_core_id', ['options' => $educationFieldOfStudyCores, 'id' => 'core']);
            echo $this->Form->input('education_isced_narrow_field_id', ['options' => $educationIscedNarrowFields, 'id' => 'narrow']);
            //
            echo $this->Form->input('education_field_of_study_sub_id', ['options' => $educationFieldOfStudySubs, 'id' => 'sub','empty' => true]);
        ?>
        <?php
            //echo $this->Form->input('education_field_of_study_sub_id', ['options' => $educationFieldOfStudySubs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
