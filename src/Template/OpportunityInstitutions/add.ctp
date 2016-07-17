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
echo $this->Html->script('userProfileEducationAdd', ['block' => 'scriptBottom']);

?>

<div class="opportunityInstitutions form large-9 medium-8 columns content">
    <?= $this->Form->create($opportunityInstitution) ?>
    <fieldset>
        <legend><?= __('Add Opportunity Institution') 
                     . ' ' . __('to') . ' ' .
                      $this->Html->link($opportunity->name_en, ['controller' => 'Opportunities', 'action' => 'viewProvider', $opportunity->id])?></legend>

        <?php
            echo $this->Form->input('country_id', ['options' => $countries, 'id' => 'selector_education_country']);
            echo $this->Form->input('institution_higher_education_id', ['options' => $institutionHigherEducations, 'id' => 'selector_education_institution', 'empty' => true]);
        ?>      




        <?php
            //echo $this->Form->input('institution_higher_education_id', ['options' => $institutionHigherEducations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
