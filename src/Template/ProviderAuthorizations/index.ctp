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

$this->layout = 'userProfile';

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

//echo debug($applicantDesiredEducations);

?>

<div class='col-md-12'>
    <div class="applicantGenerals view large-9 medium-8 columns content">

        <div class ='col-md-12'>
            <h3><?= h('My Provider Accounts') ?></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th><?= __('Provider Name') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($providers as $provider): ?>
                        <tr>
                            <td><?= h($provider->name) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>  

                </table>
        </div>

        
    </div>
</div>

<div class='col-md-12'>
    <div class="applicantGenerals view large-9 medium-8 columns content">

        <div class ='col-md-12'>
            <h3><?= h('My Provider Office Accounts') ?></h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th><?= __('Provider Office Name') ?></th>
                            <th><?= __('Country') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($providerOffices as $providerOffice): ?>
                        <tr>
                            <td><?= $this->Html->link(h($providerOffice->name),['controller' => 'ProviderOffices', 'action' => 'viewProfile', $providerOffice->id], ['escape' => false]) ?></td>
                            <td><?= h($providerOffice->country->name_en) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>  

                </table>
        </div>

        
    </div>
</div>
