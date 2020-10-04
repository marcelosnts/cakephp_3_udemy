<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * DeleteFiles behavior
 */
class DeleteFilesBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function deleteFiles($path){
        $dir = new Folder($path);

        if($dir->delete($path)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteOldFile($path, $oldImage, $newFile = null){
        if(($oldImage !== null) && ($oldImage !== $newFile)){
            $file = new File($path. $oldImage);

            $file->delete($path . $oldImage);
        }
    }
}
