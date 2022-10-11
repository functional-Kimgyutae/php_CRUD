<?php

function myLoader($className)
{
    $prefix = "Gyu\\";
    $prelen = strlen($prefix);
    if(strncmp($className , $prefix , $prelen)==0){
        $realName = substr($className,$prelen);
        $realName = str_replace("\\" , "/" , $realName);
        require_once __SRC . "/{$realName}.php";
    }
}

spl_autoload_register("myLoader");