
<?php

require_once 'env.php';

global $config;
$config = array();


if(ENV == "development"){
    $config['dbname'] = 'chatsys';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = "";
    $config['port'] = 3306;
    
}else {
    $config['dbname'] = 'galeria';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = "";
}