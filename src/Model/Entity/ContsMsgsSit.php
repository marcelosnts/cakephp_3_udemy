<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContsMsgsSit Entity
 *
 * @property int $id
 * @property string $situation
 * @property int $color_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Color $color
 * @property \App\Model\Entity\ContactMsg[] $contact_msgs
 */
class ContsMsgsSit extends Entity
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
        'situation' => true,
        'color_id' => true,
        'created' => true,
        'modified' => true,
        'color' => true,
        'contact_msgs' => true
    ];
}
