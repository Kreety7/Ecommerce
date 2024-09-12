<?php
session_start();
//session_destroy();

unset($_SESSION['user_login']);
unset($_SESSION['username']);
unset($_SESSION['userid']);

header ("Location: login.php?sucess=You are logged out sucessfully");
die;
?>