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




<div class="opportunities index large-9 medium-8 columns content">
    <h2><?= __('Browse Opportunities') ?></h2>


    <div class="col-md-12">

            <div class="col-lg-12">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div><!-- /input-group -->
            </div>
    </div>

    <div class="col-md-12">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    Panel content
                    </div>
                </div>
            </div>
    </div>

    <div class="col-md-12">
        <table cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('name_en') ?></th>
                        <th><?= $this->Paginator->sort('name_ara') ?></th>
                        <th><?= $this->Paginator->sort('description_en') ?></th>
                        <th><?= $this->Paginator->sort('description_ara') ?></th>
                        <th><?= $this->Paginator->sort('opportunity_duration_id') ?></th>
                        <th><?= $this->Paginator->sort('donation_campaign_provider_id') ?></th>
                        <th><?= $this->Paginator->sort('opportunity_scope_id') ?></th>
                        <th><?= $this->Paginator->sort('application_end_date') ?></th>
                        <th><?= $this->Paginator->sort('seats') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($opportunities as $opportunity): ?>
                    <tr>
                        <td><?= h($opportunity->name_en) ?></td>
                        <td><?= h($opportunity->name_ara) ?></td>
                        <td><?= h($opportunity->description_en) ?></td>
                        <td><?= h($opportunity->description_ara) ?></td>
                        <td><?= $opportunity->has('opportunity_duration') ? $this->Html->link($opportunity->opportunity_duration->id, ['controller' => 'OpportunityDurations', 'action' => 'view', $opportunity->opportunity_duration->id]) : '' ?></td>
                        <td><?= $opportunity->has('donation_campaign_provider') ? $this->Html->link($opportunity->donation_campaign_provider->id, ['controller' => 'DonationCampaignProviders', 'action' => 'view', $opportunity->donation_campaign_provider->id]) : '' ?></td>
                        <td><?= $opportunity->has('opportunity_scope') ? $this->Html->link($opportunity->opportunity_scope->name_en, ['controller' => 'OpportunityScopes', 'action' => 'view', $opportunity->opportunity_scope->id]) : '' ?></td>
                        <td><?= h($opportunity->application_end_date) ?></td>
                        <td><?= $this->Number->format($opportunity->seats) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $opportunity->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $opportunity->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $opportunity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $opportunity->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>



    </div>





    
</div>
