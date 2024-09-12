
<?php
require_once"./logincheck.php";
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
    <div class="container border">
        <p classs="text-right">
    <h1>Welcome to administrative pannel of Swastik Ecommerce</h1>
    <p>
        Hello <?php echo  $_SESSION['username'];?> !
        <a onclick="return confrim('Are you sure to logout?');"href="logout.php">Logout</a>
</p>

<?php require_once("./menus.php"); ?>
<div class="main" style="height:300px;">
<h2>Welcome to administrative pannel of Swastik Ecommerce</h2
</div>

<div class="footer border-top">
    copyright @  swastik_ecommerce
</div>
</div>

</body>
</html>