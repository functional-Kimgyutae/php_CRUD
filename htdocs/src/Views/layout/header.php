<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title><?= $header ?></title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link <?= $header == "메인화면" ? "active":"" ?> " href="/">메인화면</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $header == "게시판 리스트" ? "active":"" ?>" href="<?= $header == "게시판 리스트" ? "#" : "/board"?>">게시판</a>
                    </li>

                    <?php if(!__SESSION) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $header == "회원가입" ? "active":"" ?> " href="/user/register">회원가입</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $header == "로그인" ? "active":"" ?> " href="/user/login">로그인</a>
                    </li>
                    <?php else :?>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $_SESSION['user']->name ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/logout">로그아웃</a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>