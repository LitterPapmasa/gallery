<?php require 'fun.inc.php';
unsetCookieAuth();
session_destroy();
header('Location: auth-form.php');
exit;
?>
