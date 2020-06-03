<?php


class Model {

    protected $db;
    public function __construct(){
        global $config;
        
        try{
            
        $this->db = new PDO(
        "mysql:dbname=".$config["dbname"].
        ";host=".$config["host"].
        ";port=".$config["port"],
        $config['dbuser'],
        $config['dbpass']
        );
        }catch(PDOException $e){
            echo "{$e->getMessage()}";
    }
}

}