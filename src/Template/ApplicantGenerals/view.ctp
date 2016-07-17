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

//echo debug($applicantGeneral);

?>

<div class='col-md-12'>
    <div class="applicantGenerals view large-9 medium-8 columns content">
        <h3>
        <?php echo $this->Html->link(
            $this->Html->tag('span','',['class' => 'glyphicon glyphicon-edit']).' ' . __('btn_edit'),
            ['action' => 'edit', $applicantGeneral->id],
            ['class' => 'btn btn-info', 'role' => 'button' , 'escape' => false]
            );
        ?>
        </h3>

        <div class ='col-md-6'>
            <table class="table">
            <tr>
                <th><?= __('Fisrtname') ?></th>
                <td><?= h($applicantGeneral->fisrtname) ?></td>
            </tr>
            <tr>
                <th><?= __('Lastname') ?></th>
                <td><?= h($applicantGeneral->lastname) ?></td>
            </tr>
            <tr>
                <th><?= __('Fathername') ?></th>
                <td><?= h($applicantGeneral->fathername) ?></td>
            </tr>
            <tr>
                <th><?= __('Gender') ?></th>
                <td><?= h($applicantGeneral->gender->name_en) ?></td>
            </tr>
            </table>
        </div>

        <div class ='col-md-6'>
            <table class="table">
            <tr>
                <th><?= __('Birthdate') ?></th>
                <td><?= h($applicantGeneral->birthdate) ?></td>
            </tr>
            <tr>
                <th><?= __('Nationality') ?></th>
                <td><?= $_language == 'en_US' ? h($applicantGeneral->nationality->name_en) : h($applicantGeneral->nationality->name_ara) ?></td>
            </tr>
            <tr>
                <th><?= __('Marital Status') ?></th>
                <td><?php
                     switch ($applicantGeneral->marital_status) {
                        case '1':
                            echo(__('Single'));
                            break;
                        case '2':
                            echo(__('Married'));
                            break;
                        case '3':
                            echo(__('Divorced'));
                            break;
                     }
                 ?>    
                 </td>
            </tr>
            <tr>
                <th><?= __('Dependants Count') ?></th>
                <td><?= $this->Number->format($applicantGeneral->dependants_count) ?></td>
            </tr>
            </table>
        </div>


        <table class="table">
            <tr>
                <th><?= __('Has Disability') ?></th>
                <td>
                <?= 
                    ($applicantGeneral->has_disability == 0) ? h(__('No')) : h(__('Yes'));
                ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Disability Description') ?></th>
                <td><?= h($applicantGeneral->disability_description) ?></td>
            </tr>
        </table>
    </div>
</div>

<div class = 'row'>

<h3><?= __('Identity Documents') ?></h3>


<div class='col-md-2'>
    <img class="img-responsive" src=/img/passport.jpg ?>
</div>

<div class='col-md-10'>
    <div class="applicantGenerals view large-9 medium-8 columns content">
        <table class="table"> 
            <tr>
                <th><?= __('Unhcr Nb') ?></th>
                <td><?= h($applicantGeneral->unhcr_nb) ?></td>
            </tr>
            <tr>
                <th><?= __('Unrwa Nb') ?></th>
                <td><?= h($applicantGeneral->unrwa_nb) ?></td>
            </tr>
            <tr>
                <th><?= __('Has Valid Passport') ?></th>
                <td>
                <?= 
                    ($applicantGeneral->has_valid_passport == 0) ? h(__('No')) : h(__('Yes'));
                ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Has Valid National Identity Card') ?></th>
                <td>
                <?= 
                    ($applicantGeneral->has_valid_idcard == 0) ? h(__('No')) : h(__('Yes'));
                ?>
                </td>
            </tr>   
        </table>
    </div>
</div>
</div>

<div class = 'row'>
<h3><?= __('Travel Documents') ?></h3>

<div class='col-md-2'>
    <img class="img-responsive" src=/img/visa_stamps.jpg ?>
</div>

<div class='col-md-10'>
    <div class="applicantGenerals view large-9 medium-8 columns content">
        <p>
        <?php echo $this->Html->link(
            $this->Html->tag('span','',['class' => 'glyphicon glyphicon-plus']).' ' . __('Add New Travel Document'),
            ['controller' => 'ApplicantTravelDocuments', 'action' => 'add'],
            ['class' => 'btn btn-info', 'role' => 'button' , 'escape' => false]
            );
        ?>
        </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><?= __('Country') ?></th>
                    <th><?= __('Has Valid Visa') ?></th>
                    <th><?= __('Has Valid Study Permit') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($travelDocuments as $travelDocument): ?>
                <tr>
                    <td><?= $_language == 'en_US' ? h($travelDocument->country->name_en) : h($travelDocument->country->name_ara) ?></td>
                    <td><?= ($travelDocument->has_valid_visa == 0) ? h(__('No')) : h(__('Yes')) ?></td>
                    <td><?= ($travelDocument->has_study_permit == 0) ? h(__('No')) : h(__('Yes')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-pencil" aria-hidden="true"></i>',['controller' => 'ApplicantTravelDocuments', 'action' => 'edit', $travelDocument->id], ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true"></i>', ['controller' => 'ApplicantTravelDocuments', 'action' => 'delete', $travelDocument->id], [['confirm' => __('Are you sure you want to delete this record ?')], 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>  

        </table>
    </div>
</div>
</div>