<?php
session_start();
// All variables, path's and other contains in this php file
require_once "data.php";

//start - FOR ALL ----------------------

function printError($sessionVar){
    if (!empty($_SESSION[$sessionVar])) echo $_SESSION[$sessionVar];?>
    <?php unset($_SESSION[$sessionVar]);
}

//end - FOR ALL -------------------------

//start - AUTHORIZATION ------------------
function checkAuth($login, $pass, $usersdb)
{
    return !empty($login) and ($usersdb[$login] == $pass);
}

function inputFilter($var, $type = "s")
{
    switch ($type){

        case "s" : return htmlentities($var);
            break;
        case "i" : return (int)$var;
        default : return "input filter undefined";
    }
}

function setCookieAuth($login)
{
    setcookie("user", $login, time() + 84000);
    setcookie("userId",calcId($login) , time() + 84000);
}

function calcId($login)
{
    return md5($login.md5('pass'));
}

function checkLoginActive($usersdb)
{
    if (isset($_COOKIE['user']) and isset($_COOKIE['userId'])) {
        $login = $_COOKIE['user'];
        $id = $_COOKIE['userId'];
        return (array_key_exists($login, $usersdb) and $id == calcId($login));
    }
}

function unsetCookieAuth() {
    setcookie("user", '', 1);
    setcookie("userId", '', 1);
}

//end - AUTHORIZATION ------------------

//start - GALLERY ----------------------

//returns files in array
function getFiles($path){
    return array_diff(scandir($path), ['.','..']);
}

function getImagesOnly($files, $arrayExt){
    //make all data in arrayExt lower case
    $arrayExt = array_map('strtolower', $arrayExt);

    foreach($files as $number=>$file){
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $isImage = 0;
        foreach($arrayExt as $goodExt){
            $goodExt == $ext ? ++$isImage: "";
        }
        if ($isImage < 1) {
            unset($files[$number]);
        }
    }
    return $files;
}
//end - GALLERY ----------------------


