<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $article_description
 * @property string $content
 * @property string $image
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property string $brief
 * @property int $viewed
 * @property int $robot_id
 * @property int $user_id
 * @property int $situation_id
 * @property int $articles_tp_id
 * @property int $articles_cat_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Robot $robot
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Situation $situation
 * @property \App\Model\Entity\ArticlesTp $articles_tp
 * @property \App\Model\Entity\ArticlesCat $articles_cat
 */
class Article extends Entity
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
        'title' => true,
        'article_description' => true,
        'content' => true,
        'image' => true,
        'slug' => true,
        'keywords' => true,
        'description' => true,
        'brief' => true,
        'viewed' => true,
        'robot_id' => true,
        'user_id' => true,
        'situation_id' => true,
        'articles_tp_id' => true,
        'articles_cat_id' => true,
        'created' => true,
        'modified' => true,
        'robot' => true,
        'user' => true,
        'situation' => true,
        'articles_tp' => true,
        'articles_cat' => true
    ];
}
