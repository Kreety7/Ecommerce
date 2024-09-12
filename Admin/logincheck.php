<?php
session_start();
if(!isset($_SESSION['user_login'])){
header("location:login.php?error=You are not logged in, Please log in first");
die;
}
require_once"../connection.php";
