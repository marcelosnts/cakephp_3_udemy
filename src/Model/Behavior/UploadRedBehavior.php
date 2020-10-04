<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * UploadRed behavior
 */
class UploadRedBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function uploadImgRed(array $file, $path, $width, $height){
        $this->createDirectoryImgRed($path);

        $this->checkFileExt($file, $path, $width, $height);

        return $this->upload($file, $path);
    }

    public function checkFileExt($file, $path, $width, $height){
        extract($file);

        switch($type){
            case 'image/jpeg';
            case 'image/pjpeg';
                $image = imagecreatefromjpeg($tmp_name);
                $newImage = $this->redImage($image, $width, $height);

                imagejpeg($newImage, $path . $name);
            break;
            case 'image/png';
            case 'image/x-png';
                $image = imagecreatefrompng($tmp_name);
                $newImage = $this->redImage($image, $width, $height);

                imagepng($newImage, $path . $name);
            break;
        }
    }

    protected function redImage($image, $width, $height){
        $og_width = imagesx($image);
        $og_height = imagesy($image);

        $newImage = imagecreatetruecolor($width, $height);

        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, $og_width, $og_height);

        return $newImage;
    }

    protected function createDirectoryImgRed($path){
        $dir = new Folder($path);

        if(is_null($dir->path)){
            $dir->create($path);
        }
    }

    protected function upload($file, $path){
        extract($file);

        if(move_uploaded_file($tmp_name, $path . $name)){
            return $name;
        }else {
            return false;
        }
    }

    public function slugUploadImgRed($name){
        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($formato['a']), $formato['b']);
        $name = str_replace(' ', '-', $name);

        $name = str_replace(['-----', '----', '---', '--'], '-', $name);

        $name = strtolower($name);

        return $name;
    }
}
