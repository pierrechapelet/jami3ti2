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

$this->layout = 'default_white';

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

//echo debug();

?>




<div style="position: absolute; left: 0px; top: 0px; z-index: -1; width: 100%; height: 330px;" tabindex="0">
    <img class="featurette-image img-responsive" src="/img/banner_opportunity.jpg" alt="Generic placeholder image">
</div>

<div class="opportunities view large-9 medium-8 columns content">
    <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?= $_language == 'en_US' ? h($opportunity->name_en) : h($opportunity->name_ara) ?></h2>
    <div class="col-md-9">
        <table class="table vertical-table">
            <tr>
                <th><?= __('Seats') ?></th>
                <td><?= $this->Number->format($opportunity->seats) ?></td>
            </tr>
            <tr>
                <th><?= __('Application End Date') ?></th>
                <td><?= h($opportunity->application_end_date) ?></td>
            </tr>
            <tr>
                <th><?= __('Description') ?></th>
                <td><?= $_language == 'en_US' ?
                    h($opportunity->description_en) : 
                    h($opportunity->description_ara) ?></td>
            </tr>
            <tr>
                <th><?= __('Duration') ?></th>
                <td><?= $_language == 'en_US' ? 
                    h($opportunity->opportunity_duration->name_en) : 
                    h($opportunity->opportunity_duration->name_ara)
                    ?>        
                </td>
            </tr>
            <tr>
                <th><?= __('Scope') ?></th>
                <td><?= $_language == 'en_US' ?
                    h($opportunity->opportunity_scope->name_en) :
                    h($opportunity->opportunity_scope->name_ara)
                    ?>    
                </td>
            </tr>
            <tr>
                <th><?= __('Provider') ?></th>
                <td>
                    <b><?= h($opportunity->donation_campaign_provider->provider_office->name) ?></b>
                    <p>
                        <?= h($opportunity->donation_campaign_provider->provider_office->addr_line1) ?><br>
                        <?= h($opportunity->donation_campaign_provider->provider_office->addr_line2) ?><br>
                        <?= h($opportunity->donation_campaign_provider->provider_office->addr_line3) ?><br>
                        <?= h($opportunity->donation_campaign_provider->provider_office->postcode) ?><br>
                        <?= h($opportunity->donation_campaign_provider->provider_office->city) ?><br>
                        <i class="fa fa-phone" aria-hidden="true"></i> <?= h($opportunity->donation_campaign_provider->provider_office->phone) ?><br>
                        <i class="fa fa-fax" aria-hidden="true"></i> <?= h($opportunity->donation_campaign_provider->provider_office->fax) ?><br>
                        <i class="fa fa-envelope" aria-hidden="true"></i> <?= $this->Text->autoLinkEmails(h($opportunity->donation_campaign_provider->provider_office->email)) ?><br>
                        
                    </p>
                </td>
            </tr>
        </table>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= h('Opportunity Characteristics') ?></h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($opportunity->countries)): ?>
                <h4><?= __('Destination Countries') ?></h4>
                <p>
                    <?php foreach ($opportunity->countries as $countries): ?>
                    <?= $_language == 'en_US' ? h($countries->name_en) . ' - ' : h($countries->name_ara) . ' - '  ?>
                    <?php endforeach; ?>
                </p>
                <?php endif ?>

                <?php if (!empty($opportunity->education_types)): ?>
                <h4><?= __('Programme Type') ?></h4>
                <p>
                    <?php foreach ($opportunity->education_types as $educationTypes): ?>
                    <?= $_language == 'en_US' ? h($educationTypes->name_en) . ' - ' : h($educationTypes->name_ara) . ' - ' ?>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>

                <?php if (!empty($opportunity->education_subs)): ?>
                <h4><?= __('Field of Study') ?></h4>
                <p>
                    <?php foreach ($opportunity->education_subs as $educationSubs): ?>
                    <?= $_language == 'en_US' ? h($educationSubs->name_en) . ' - ' : h($educationSubs->name_ara) . ' - ' ?>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>

                <?php if (!empty($opportunity->institutions)): ?>
                <h4><?= __('Target Higher Education Institutions') ?></h4>
                <table class= 'table'>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <th><?= __('City') ?></th>
                        <th><?= __('Phone') ?></th>
                        <th><?= __('Email') ?></th>
                        <th><?= __('Website') ?></th>
                        <th><?= __('Type') ?></th>
                    </tr>
                    <?php foreach ($opportunity->institutions as $institutions): ?>
                    <tr>
                        <td><?= h($institutions->name) ?></td>
                        <td><?= h($institutions->city) ?></td>
                        <td><?= h($institutions->phone) ?></td>
                        <td><?= $this->Text->autoLinkEmails(h($institutions->email)) ?></td>
                        <td><?= $this->Text->autoLinkUrls(h($institutions->website)) ?></td>
                        <td><?= h($institutions->type) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="alert alert-danger" role="alert"><b>Registration Opening Soon...</b> Please come back later to register</div>
        <img class="featurette-image img-responsive img-rounded center-block" src="/img/micro_book.jpg" alt="Generic placeholder image">
    </div>

</div>
