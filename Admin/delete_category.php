<?php
require_once"./logincheck.php";


  if(!isset($_GET['id'])) {
    //die("Please provide a valis ID for the category.");
    header("Location:categories.php?error=Please provide a valid ID for the category");
  }

  $id=(int)$_GET['id'];

$sql="  DELETE FROM categories where id=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
header("Location:categories.php?sucess=Selected category is deleted sucessfully");
die;
  
