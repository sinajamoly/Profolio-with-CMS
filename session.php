<?php
/**
 * Created by PhpStorm.
 * User: sina
 * Date: 1/15/2018
 * Time: 3:03 PM
 */

class Session{
    public $signed_in;
    public $user_id;

    function __construct(){
        session_start();
        $this->check_the_login();
    }

    public function is_signed_in(){
        return $this->signed_in;
    }

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in=true;
        }else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }

    public function login($user){
        if($user){
            $this->user_id=$_SESSION['user_id']=$user->id;
            $this->signed_in=true;
        }
    }

    public function logout(){
        unset($this->user_id);
        unset($_SESSION['user_id']);
        $this->signed_in=false;
    }
}
$session=new Session();