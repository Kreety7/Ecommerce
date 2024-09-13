<?php
require_once"./logincheck.php";


  if(!isset($_GET['id'])) {
    //die("Please provide a valis ID for the category.");
    header("Location:products.php?error=Please provide a valid ID for the product");
  }

  $id=(int)$_GET['id'];

$sql="  DELETE FROM products where id=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
header("Location:products.php?sucess=Selected product is deleted sucessfully");
die;
  
