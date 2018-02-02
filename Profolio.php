<?php
/**
 * Created by PhpStorm.
 * User: sina
 * Date: 1/18/2018
 * Time: 7:12 PM
 */

class Profolio extends db_object
{
    protected static $db_table="projects";
    protected static $db_table_fields=array('title','description','image','language','link');
    public $id;
    public $title;
    public $description;
    public $image;
    public $language;
    public $link;

    public $imageDirectory='img';

    public function add_image($file){;
        if($file){
            move_uploaded_file($file['tmp_name'],$this->imageDirectory.DS.basename($file['name']));
            $this->image=$this->imageDirectory."/".basename($file['name']) ;
            return true;
        }else{
            return false;
        }
    }





}