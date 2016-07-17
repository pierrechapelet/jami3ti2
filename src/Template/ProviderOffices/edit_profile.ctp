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



<div class="providerOffices form large-9 medium-8 columns content">
    <?= $this->Form->create($providerOffice) ?>
    <fieldset>
        <legend><?= __('Edit Provider Office') ?></legend>
        <?php
            echo $this->Form->input('provider_id', ['options' => $providers, 'empty' => true]);
            echo $this->Form->input('country_id', ['options' => $countries, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('addr_line1');
            echo $this->Form->input('addr_line2');
            echo $this->Form->input('addr_line3');
            echo $this->Form->input('city');
            echo $this->Form->input('postcode');
            echo $this->Form->input('phone');
            echo $this->Form->input('fax');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
