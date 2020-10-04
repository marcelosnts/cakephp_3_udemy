<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * SlugUrl behavior
 */
class SlugUrlBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function slugUrl($slug){
        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $slug = strtr(utf8_decode($slug), utf8_decode($formato['a']), $formato['b']);
        $slug = str_replace(' ', '-', $slug);

        $slug = str_replace(['-----', '----', '---', '--'], '-', $slug);

        $slug = strtolower($slug);

        return $slug;
    }
}
