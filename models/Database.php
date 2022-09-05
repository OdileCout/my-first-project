<?php
class Database{
    protected $db = null;
    public function __construct(){
        try{
            $this->db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',LOGIN, PASSWORD);
        }catch(Exception $mess){
            $mess->getMessage();
        }
    }
}