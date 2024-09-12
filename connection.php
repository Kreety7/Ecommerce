<?php
$con="null";
try{
$con=new PDO("mysql:host=localhost;dbname=swastik_ecommerce","root",);
// echo "Database connection sucessful";
}
catch(Exception $e){
    echo "There was an error on database".$e->getMessage();
    die;
}
?>
    
