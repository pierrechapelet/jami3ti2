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

//echo debug($user);

?>

<div class="providerOffices view large-9 medium-8 columns content">


    <h3><?php echo $this->Html->link(
            $this->Html->tag('span','',['class' => 'glyphicon glyphicon-edit']).' ' . __('btn_edit'),
            ['action' => 'editProfile', $providerOffice->id],
            ['class' => 'btn btn-info', 'role' => 'button' , 'escape' => false]
            );
    ?></h3>

    <table class="table vertical-table">
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $providerOffice->has('provider') ? $this->Html->link($providerOffice->provider->name, ['controller' => 'Providers', 'action' => 'view', $providerOffice->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $providerOffice->has('country') ? $this->Html->link($providerOffice->country->name_en, ['controller' => 'Countries', 'action' => 'view', $providerOffice->country->code]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($providerOffice->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line1') ?></th>
            <td><?= h($providerOffice->addr_line1) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line2') ?></th>
            <td><?= h($providerOffice->addr_line2) ?></td>
        </tr>
        <tr>
            <th><?= __('Addr Line3') ?></th>
            <td><?= h($providerOffice->addr_line3) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($providerOffice->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($providerOffice->postcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($providerOffice->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($providerOffice->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($providerOffice->email) ?></td>
        </tr>
    </table>

</div>
