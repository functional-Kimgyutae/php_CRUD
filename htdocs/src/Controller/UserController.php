<?php

namespace Gyu\Controller;

use Gyu\App\DB;
use Gyu\Lib\Lib;

class UserController extends MasterController
{
    public function login()
    {
        $this->render("login" , ['header'=>"로그인"]);
    }

    public function loginProcess()
    {
        $userId = $_POST['userId'];
        $pass = $_POST["pass"];
        if(trim($userId) == "" || trim($pass)==""){
            Lib::back("필수값을 입력하세요.");
            exit();
        }
        $db = new DB();
        $sql = "SELECT * FROM `users` WHERE userId=? And password=PASSWORD(?)";
        $result = $db->fetch($sql,[$userId , $pass]);
        if($result){
            $_SESSION['user'] = $result;
            Lib::msg("정상적으로 로그인되었습니다." , "/");
        }else {
            Lib::back("아이디 또는 비밀번호가 다릅니다.");
        }
    }

    public function register()
    {
        $this->render("register" , ['header'=>"회원가입"]);
    }

    public function registerProcess()
    {
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $pass = $_POST["pass"];
        $passc = $_POST["passc"];
        if(trim($userId) == "" || trim($pass)==""||trim($passc)==""||trim($name)==""){
            Lib::back("필수값을 입력하세요.");
            exit();
        }
        if($pass !== $passc){
            Lib::back("비밀번호가 일치하지 않습니다.");
            exit();
        }
        $db = new DB();
        $sql = "SELECT * FROM `users` WHERE userId=?";
        $result = $db->fetchAll($sql,[$userId]);
        if($result){
            Lib::back("아이디가 중복됩니다.");
            exit();
        }
        $sql = "INSERT INTO `users` (`userId`, `name`, `password`) VALUES (?,?, PASSWORD(?));";
        $result = $db->execute($sql , [$userId , $name , $pass]);
        if($result){
            Lib::msg("정상적으로 회원가입되었습니다." , "/");
        }else {
            Lib::back("회원가입중 오류 발생. 잠시후 다시 시도해 주세요.");
        }
    }
    public function logout()
    {
        unset($_SESSION['user']);
        Lib::msg("정상적으로 로그아웃되었습니다.","/");
    }
}