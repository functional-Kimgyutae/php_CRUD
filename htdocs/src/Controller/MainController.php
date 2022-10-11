<?php

namespace Gyu\Controller;

use Gyu\App\DB;


class MainController extends MasterController
{
    public function main()
    {
        $db= new DB();
        $sql = "SELECT * FROM `boards` ORDER BY idx DESC LIMIT 0, 5";
        $result = $db->fetchAll($sql);
        $this->render("main" , ['header'=>"메인화면" , "boards"=>$result]);
    }
}