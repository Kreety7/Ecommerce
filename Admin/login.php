<?php
session_start();

require_once "../connection.php";
if($_SERVER['REQUEST_METHOD']==='POST'){
   $username= $_POST['username'];
   $pwd= $_POST['pwd'];
   /*if ($username==='Kriti'&& $passwd==='awalkreety@gmail.com'){
    echo'correct login.';
   }else{
    echo 'Invalid credentials.';
   }*/

   $sql="SELECT * FROM users WHERE username='$username' AND password='$pwd'";
   $loginStmt=$con->prepare($sql);
   $loginStmt->execute();

   $loginuser=$loginStmt->fetch(PDO::FETCH_ASSOC);
   if($loginuser){
     $_SESSION['user_login']=true;
     $_SESSION['username']= $loginuser['username'];
     $_SESSION['userid']= $loginuser['id'];//store user's id in session
     header("Location:index.php");
   
   }else {
    header("Location:login.php?error=Your entered credentials do not match your records.");
    die;
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administartive Panel-Swastik Ecommerce</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_GET['error'])){?>
            <div class="alert alert-danger">
            <?php echo $_GET['error'];?>
            </div>
            <?php }?>

        <form method="post" action="">
        <div class="row">
            <div class="col-4">
                <label for="username">Username</label>
</div>
<div class="col-8">
        <input type="text" name="username" id="username">
</div>
<div class="row">
            <div class="col-4">
                <label for="pwd">Password</label>
</div>
<div class="col-8">
        <input required type="password" name="pwd" id="pwd">
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Login</button>
    
</div>
</div>
</form>
</div>
</body>
</html>