<?php

spl_autoload_register(function ($class){
 
    $class = $class .".php";
    $file = namespaceChecker($class);
    if(file_exists($file) && is_file($file))
        require_once $file;
   
}); 

function namespaceChecker($class){
    $controllersNamespace = "Controller";  
    $modelsNamespace = "Model";
    if(strpos($class,$controllersNamespace)){
        return __DIR__."./Controllers/".$class;
    } else if(strpos($class,$modelsNamespace)){
        return __DIR__."./Models/".$class;
    } else if(file_exists(__DIR__."./Core/".$class)){
        return __DIR__."./Core/".$class;
    } else {
        return null;
    }
}

?>