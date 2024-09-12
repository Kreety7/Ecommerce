<?php
require_once"./logincheck.php";



if($_SERVER['REQUEST_METHOD']==='POST'){
    $name= $_POST['name'];
    $description= $_POST['description'];
    $status=$_POST['status'];
    
    $sql = "INSERT INTO categories SET 
    name='$name',
    description='$description',
    status=$status";
    $catStmt=$con->prepare($sql);
    $catStmt->execute();

    header("Location:categories.php?sucess=Category added sucessfully");
    die;
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
    <div class="container border">
        <p classs="text-right">
    <h1>Welcome to administrative pannel of Swastik Ecommerce</h1>
    <p>
        Hello <?php echo $_SESSION['username'];?> !
        <a onclick="return confrim('Are you sure to logout?');"href="logout.php">Logout</a>
</p>

<?php require_once("./menus.php"); ?>
<div class="main">
    <h2>Categories</h2>
    <div class="card">
        <div class="card-header"> 
            Add new Category
        <a href="add_category.php" class="btn btn-primary btn-sm">Add new</a>

        <div class="card-body">
            <form method="post" action="">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for ="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="">select status</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
</select>
        
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="categories.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</div>
<div class="footer border-top">
     copyright @Swastik Ecommerce
    </div>
</body>
</html>
            