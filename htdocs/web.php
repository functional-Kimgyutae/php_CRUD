<?php

use Gyu\App\Route;

if(__SESSION){
    Route::get("/board/write", "BoardController@write");
    Route::post("/board/write", "BoardController@writeProcess");
    Route::get("/board/mod", "BoardController@mod");
    Route::post("/board/mod", "BoardController@modProcess");
    Route::get("/board/del", "BoardController@del");
    Route::get("/user/logout", "UserController@logout");
}else {
    Route::get("/user/login", "UserController@login");
    Route::post("/user/login", "UserController@loginProcess");
    Route::get("/user/register", "UserController@register");
    Route::post("/user/register", "UserController@registerProcess");
}
Route::get("/", "MainController@main");
Route::get("/board", "BoardController@board");
Route::get("/board/view", "BoardController@view");

