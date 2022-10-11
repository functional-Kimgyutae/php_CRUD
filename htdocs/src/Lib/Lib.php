<?php

namespace Gyu\Lib;

class Lib
{
    public static function msg($msg , $root)
    {
        echo "<script>";
        echo "alert('{$msg}');";
        echo "location.href = '{$root}';";
        echo "</script>";
    }

    public static function back($msg )
    {
        echo "<script>";
        echo "alert('{$msg}');";
        echo "history.back();";
        echo "</script>";
    }
}



