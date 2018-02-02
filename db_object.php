<?php
/**
 * Created by PhpStorm.
 * User: sina
 * Date: 1/14/2018
 * Time: 8:27 PM
 */

class db_object
{

    public function get_prop_with_value(){
        $db_prop=static :: $db_table_fields;
        $prop=get_object_vars($this);
        $result=array();
        foreach($prop as $attribute=>$value){
            if(in_array($attribute,$db_prop)){
                $result[$attribute]=$value;
            }
        }
        return $result;
    }



    public static function find_all(){
        return static::find_this_query("SELECT * FROM ". static::$db_table ." ");
    }

    public static function find_this_query($sql){
        global $database;
        $result_set=$database->query($sql);
        $the_object_array=array();
        while($row=mysqli_fetch_array($result_set)){
            $the_object_array[]=static :: instantiation($row);
        }
        return $the_object_array;
    }

    public static function find_by_id($id){
        $result= static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE id=".$id." ");
        return !empty($result)? array_shift($result):false;
    }

    public static function instantiation($the_record){
        $calling_class=get_called_class();
        $the_object=new $calling_class;
        foreach ($the_record as $the_attribute=> $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute=$value;
            }
        }
        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties=get_object_vars($this);
        return array_key_exists($the_attribute,$object_properties);
    }

    public function delete(){
        global $database;
        $database->query("DELETE FROM ".static ::$db_table ." WHERE id=" . $database->escape_string($this->id) ." ");
    }

    public function update(){
        global $database;
        $prop=$this->get_prop_with_value();
        $tmp_sql=array();
        foreach($prop as $attribute=>$value){
            if(is_int($prop[$attribute])){
                $tmp_sql[]=" ${attribute} = {$value} ";
            }else{
                $tmp_sql[]=" ${attribute} = '{$value}' ";
            }

        }
        $counter=true;
        $sql="UPDATE ".Static::$db_table." SET ";
        foreach ($tmp_sql as $value){
            if($counter){
                $sql .=" ".$value;
                $counter=false;
            }else{
                $sql .=" , ".$value;
            }
        }
        $sql .= " WHERE id={$this->id}";
        echo $sql;
        $database->query($sql);
    }

    public function create(){
        global $database;
        $prop=$this->get_prop_with_value();

        $tmp_attribute_sql=array();
        $tmp_value_sql=array();

        foreach($prop as $attribute=>$value){
            if(is_int($prop[$attribute])){
                $tmp_value_sql[]=" {$value} ";
                $tmp_attribute_sql[]=" {$attribute} ";
            }else{
                $tmp_value_sql[]=" '{$value}' ";
                $tmp_attribute_sql[]=" {$attribute} ";
            }

        }
        $perm=true;
        $perm2=true;

        $sql="INSERT INTO ".static ::$db_table." (";
        foreach ($tmp_attribute_sql as $attribute){
            if($perm){
                $sql .=$attribute;
                $perm=false;
            }else{
                $sql .=", ".$attribute;
            }
        }
        $sql .=")";
        $sql .=" VALUES (";
        foreach ($tmp_value_sql as $value){
            if($perm2){
                $sql .=$value;
                $perm2=false;
            }else{
                $sql .=", ".$value;
            }
        }
        $sql .=")";
        $database->query($sql);
    }






}