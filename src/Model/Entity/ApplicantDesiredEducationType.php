<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicantDesiredEducationType Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $education_desired_type_id
 * @property \App\Model\Entity\EducationDesiredType $education_desired_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ApplicantDesiredEducationType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
