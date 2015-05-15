<?php require 'fun.inc.php';

if (!empty($_POST['login']) and !empty($_POST['pass'])) {
    $login = inputFilter($_POST['login']);
    $pass = inputFilter($_POST['pass']);
    if (checkAuth($login, $pass, $usersdb)){
        setCookieAuth($login);

        header("Location: index.php");
        exit;

    } else {
        $_SESSION['message'] = "login or password incorrect";
        header("Location: auth-form.php");
        exit;
    }


} else {
    $_SESSION['message'] = "Fill empty fields";
    header("Location: auth-form.php");
    exit;
}