<?php
require_once"./logincheck.php";

$stmtCategory=$con->prepare("SELECT * FROM categories");
$stmtCategory->execute();
$categories=$stmtCategory->FetchAll(PDO::FETCH_ASSOC);
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
</div>
        <div class="card-body p-0">
            <?php if(isset($_GET['error'])) {?>
                <div class="alert alert-danger">
                    <?php echo $_GET['error'];?>
                </div>
            <?php }?>

            <?php if(isset($_GET['sucess'])) {?>
                <div class="alert alert-sucess">
                    <?php echo $_GET['sucess'];?>
            </div>
            <?php }?>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
</tr>
</thead>
</tbody>
<?php
foreach($categories as $category){
    ?>
<tr>
    <td><?php echo $category['id']; ?></td>
    <td><?php echo $category['name']; ?></td>
    <td><?php echo $category['status']==1?'Active':'Inactive';?></td>
                        <td>
                           <a href="edit_category.php?id=<?php echo $category['id']; ?>">Edit</a>
                           <a 
                            onclick="return confirm ('Are you sure to delete this category ?');"
                           href="delete_category.php?id=<?php echo $category['id']; ?>">Delete</a>
</td>
</tr>
<?php
}

?>
<div class="footer border-top">
     copyright @Swastik Ecommerce
    </div>
</body>
</html>