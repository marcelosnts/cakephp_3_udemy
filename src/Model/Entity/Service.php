<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string $sv_title
 * @property string $icon_sv_one
 * @property string $title_sv_one
 * @property string $desc_sv_one
 * @property string $icon_sv_two
 * @property string $title_sv_two
 * @property string $desc_sv_two
 * @property string $icon_sv_three
 * @property string $title_sv_three
 * @property string $desc_sv_three
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Service extends Entity
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
        'sv_title' => true,
        'icon_sv_one' => true,
        'title_sv_one' => true,
        'desc_sv_one' => true,
        'icon_sv_two' => true,
        'title_sv_two' => true,
        'desc_sv_two' => true,
        'icon_sv_three' => true,
        'title_sv_three' => true,
        'desc_sv_three' => true,
        'created' => true,
        'modified' => true
    ];
}
