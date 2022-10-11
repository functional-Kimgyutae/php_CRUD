<?php

namespace Gyu\Controller;

use Gyu\App\DB;
use Gyu\Lib\Pag;
use Gyu\Lib\Lib;

class BoardController extends MasterController
{
    public function board()
    {
        $p = 1;
        if(isset($_GET['p'])&&is_numeric($_GET['p'])){
            $p = $_GET['p']*1;
        }
        $db = new DB();
        $start = ($p -1) * 10;
        $sql = "SELECT * FROM `boards` ORDER BY idx DESC LIMIT {$start}, 10";
        $result = $db->fetchAll($sql);
        $cnt = $db->fetch("SELECT COUNT(*) AS cnt FROM `boards`")->cnt;
        $pg = new Pag($cnt , $p);
        $this->render("board" , ['header'=>"게시판 리스트" , 'boards'=>$result ,"pg"=>$pg]);
    }

    public function view()
    {
        $idx = $_GET['idx'];
        $db = new DB();
        $sql = "SELECT * FROM boards WHERE idx=?";
        $result =$db->fetch($sql , [$idx]);
        $this->render("view",["header"=>"게시판 리스트", 'b'=>$result]);
    }

    public function write()
    {
        $this->render("write",["header"=>"게시판 리스트"]);
    }

    public function writeProcess()
    {
       $userId = $_SESSION['user']->userId;
       $writer = $_SESSION['user']->name;
       $title = $_POST['title'];
       $content = $_POST['content'];

       if(trim($title)=="" || trim($content)==""){
            Lib::back("필수값을 입력해주세요.");
            exit();
       } 

       $db = new DB();
       $sql = "INSERT INTO `boards` (`title`, `content`, `writer`, `userId`, `date`) VALUES (?, ?, ?, ?, NOW());";
       $result = $db->execute($sql , [$title,$content,$writer,$userId]);
       if($result){
            Lib::msg("정상적으로 글이 업로드되었습니다.","/");
            exit();
       }else {
            Lib::back("데이터베이스 오류발생. 잠시후 다시 시도해주세요.");
       }

    }

    public function mod()
    {
        $userId = $_SESSION['user']->userId;
        $idx = $_GET['idx'];
        $db = new DB();
        $sql ="SELECT * FROM boards WHERE idx=?";
        $result = $db->fetch($sql,[$idx]);
        if($userId !== $result->userId){
            Lib::msg("해당 글에 권한이 없습니다.","/board");
            exit();
        }
        $this->render("mod",["header"=>"게시판 리스트","b"=>$result]);
    }

    public function modProcess()
    {
        $idx = $_POST['idx'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        if(trim($title)=="" || trim($content)==""){
            Lib::back("필수값을 입력해주세요.");
            exit();
        } 
        $db = new DB();
        $sql = "UPDATE `boards` SET `title`=?,`content`=? WHERE idx=?";
        $result = $db->execute($sql,[$title,$content,$idx]); 
        if($result){
            Lib::msg("글이 정상적으로 수정되었습니다.","/board/view?idx=$idx");
        }else {
            Lib::back("데이터베이스 오류발생. 잠시후 다시 시도해주세요.");   
        }
    }

    public function del()
    {
        $userId = $_SESSION['user']->userId;
        $idx = $_GET['idx'];
        $db = new DB();
        $sql ="SELECT * FROM boards WHERE idx=?";
        $result = $db->fetch($sql,[$idx]);
        if($userId !== $result->userId){
            Lib::msg("해당 글에 권한이 없습니다.","/board");
            exit();
        }
        $sql = "DELETE FROM `boards` WHERE idx=?";
        $db->execute($sql,[$idx]);
        Lib::msg("삭제되었습니다.","/board");
    }


}