<?php



function classAutoLoader($class){
    $class = strtolower($class);
    $path = "Includes/{$class}.php";
    if(is_file($path) && !class_exists($class)){
        require_once($path);
    }
}

spl_autoload_register('classAutoLoader');


function redirect($loction){
    header("Location: $loction");
}