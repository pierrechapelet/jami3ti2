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

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faq'), ['action' => 'edit', $faq->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faq'), ['action' => 'delete', $faq->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faq->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faqs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faq'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faqs view large-9 medium-8 columns content">
    <h3><?= h($faq->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Question En') ?></th>
            <td><?= h($faq->question_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Question Ara') ?></th>
            <td><?= h($faq->question_ara) ?></td>
        </tr>
        <tr>
            <th><?= __('Answer En') ?></th>
            <td><?= h($faq->answer_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Answer Ara') ?></th>
            <td><?= h($faq->answer_ara) ?></td>
        </tr>
        <tr>
            <th><?= __('Link') ?></th>
            <td><?= h($faq->link) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($faq->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $this->Number->format($faq->is_active) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($faq->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($faq->modified) ?></td>
        </tr>
    </table>
</div>
