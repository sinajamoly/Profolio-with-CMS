<?php
/**
 * Created by PhpStorm.
 * User: sina
 * Date: 1/20/2018
 * Time: 10:21 PM
 */

class User extends db_object
{
    protected static $db_table="users";
    protected static $db_table_fields=array('username','password');
    public $id;
    public $username;
    public $password;

    public static function varify($username,$password){
        $status=false;
        $users =self ::find_all();
        foreach ($users as $row){
            if($row->username==$username){
                if($row->password==$password){
                    global $session;
                    $session->login($row);
                }else{
                    return false;
                }
            }
        }
    }
}