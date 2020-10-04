<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carousel Entity
 *
 * @property int $id
 * @property string $carousel_name
 * @property string $image
 * @property string|null $title
 * @property string|null $description
 * @property string|null $button_title
 * @property string|null $link
 * @property int $slide_order
 * @property int $position_id
 * @property int|null $color_id
 * @property int $situation_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Color $color
 * @property \App\Model\Entity\Situation $situation
 */
class Carousel extends Entity
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
        'carousel_name' => true,
        'image' => true,
        'title' => true,
        'description' => true,
        'button_title' => true,
        'link' => true,
        'slide_order' => true,
        'position_id' => true,
        'color_id' => true,
        'situation_id' => true,
        'created' => true,
        'modified' => true,
        'position' => true,
        'color' => true,
        'situation' => true
    ];
}
