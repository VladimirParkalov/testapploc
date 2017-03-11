<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 *
 * @property \App\Model\Entity\Course[] $courses
 */
class Student extends Entity
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
        'id' => false
    ];

    protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' . $this->_properties['last_name'];
    }

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }


}
