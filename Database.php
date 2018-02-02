<?php
/**
 * Created by PhpStorm.
 * User: sina
 * Date: 1/14/2018
 * Time: 6:46 PM
 */
require_once ("new_config.php");
class Database
{
    public $connection;

    function __construct(){
        $this->open_db_connection();
    }

//    _____________________________________________________________________________
//    THIS CONNECT THE CLASS TO THE DATABASE BY USING THE CONFIGURATIONS DEFINED IN
//    NEW_CONFIG.PHP FILE
//    _____________________________________________________________________________
    private function open_db_connection(){
        $this->connection=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        if(!$this->connection){
            die("the connection to mysql server have been failed");
        }else{

        }

    }


//    _____________________________________________________________________________
//    THIS IS THE QUERY EXECUTER USED TO WRITE THE DATA IN DATABASE
//    _____________________________________________________________________________
    public function query($sql){
        $result=$this->connection->query($sql);
        if(!$result){
            $result=$this->confirm_query($result);
        }
        return $result;
    }

    ///////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
    private function confirm_query($result){
        if(!$result){
            die("QUERY FAILED".$this->connection->error);
        }
    }

    public function escape_string($string){
        $escape_string=$this->connection->real_escape_String($string);
        return $escape_string;
    }
}
$database=new Database();