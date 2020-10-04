<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactMsg Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property int|null $user_id
 * @property int $conts_msgs_sit_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ContsMsgsSit $conts_msgs_sit
 */
class ContactMsg extends Entity
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
        'name' => true,
        'email' => true,
        'subject' => true,
        'message' => true,
        'user_id' => true,
        'conts_msgs_sit_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'conts_msgs_sit' => true
    ];
}
