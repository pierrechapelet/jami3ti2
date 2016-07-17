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

?>

<div class="opportunities form large-9 medium-8 columns content">
    <?= $this->Form->create($opportunity) ?>
    <fieldset>
        <legend><?= __('Add Opportunity') ?></legend>
        <?php
            echo $this->Form->input('name_en');
            echo $this->Form->input('name_ara');
            echo $this->Form->input('donation_campaign_provider_id', ['options' => $donationCampaignProviders]);
            echo $this->Form->input('description_en', ['type'=>'textArea','rows'=>'10', 'Description','label'=>__('description_en')]);
            echo $this->Form->input('description_ara', ['type'=>'textArea','rows'=>'10', 'Description','label'=>__('description_ara')]);
            echo $this->Form->input('opportunity_duration_id', ['options' => $opportunityDurations]);
            
            echo $this->Form->input('opportunity_scope_id', ['options' => $opportunityScopes]);
            echo $this->Form->input('application_end_date', ['empty' => true]);
            echo $this->Form->input('budget');
            echo $this->Form->input('currency_id', ['options' => $currencies, 'empty' => true]);
            echo $this->Form->input('seats');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
