<?php

namespace Gyu\App;

use Gyu\Lib\Lib;

class Route
{
    public static $actions = [];
    public static function __callStatic($name, $args)
    {
        $req = strtolower($_SERVER['REQUEST_METHOD']);
        if($req == $name){
            self::$actions[] = $args;
        }
    }
    public static function init()
    {
        $path = explode("?" , $_SERVER['REQUEST_URI']);
        $path = $path[0];
        foreach(self::$actions as $a){
            if($path == $a[0]){
                $action = explode("@" ,$a[1]);
                $className = "Gyu\\Controller\\" . $action[0];
                $c = new $className();
                var_dump($action[1]);
                $c->{$action[1]}();
                return;
            }
        }
        Lib::msg("없는 페이지거나 권한이 없습니다." , "/");
    }


}