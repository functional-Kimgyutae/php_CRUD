<?php

namespace Gyu\Controller;

class MasterController
{
    public static function render($views , $data = [])
    {
        extract($data);
        require_once __VIEW . "/layout/header.php";
        require_once __VIEW . "/{$views}.php";
    }
}