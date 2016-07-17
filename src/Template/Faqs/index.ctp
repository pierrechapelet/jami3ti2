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



<div class="faqs index large-9 medium-8 columns content">
    <h3><?= __('Faqs') ?></h3>
    <table class= "table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th><?= $this->Paginator->sort('question') ?></th>
                <th><?= $this->Paginator->sort('answer') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faqs as $faq): ?>
            <tr>

               <p style="text-align:justify"> <td align="justify"> <?= h($faq->question) ?></td></p>
                <td align="justify"> <?= h($faq->answer) ?></td>
                
  
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
