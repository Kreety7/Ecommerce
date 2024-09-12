<?php
require_once "./logincheck.php"; 

$sql="SELECT
categories.name as category_name,
products.*
FROM products
INNER JOIN categories ON categories.id=products.category_id";
$stmt=$con->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrative Pannel-Swastik Ecommerce</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
    <h1>Hello Welcome to Adminstrative Pannel-Swastik Ecommerce</h1>
    <p>
        Hello <?php echo $_SESSION['username'];?> !
        <a  onclick="return confirm('Are you sure to logout');" href="logout.php">Logout</a>
    </p>
     <?php require_once("./menus.php");?>
<div class="main" >
<h2> Products</h2>
<div class="card-header">
    Products listing
</div>
<div class="card-body">
<a href="add_product.php" class="btn btn-primary btn-sm">Add New</a>

<div class="card-body p-0">
    <?php if(isset($_GET['error'])){?>
     <div class="alert alert-danger">
        <?php echo $_GET['error'];?>
     </div>
     <?php } ?>

     <?php if(isset($_GET['success'])){?>
     <div class="alert alert-danger">
        <?php echo $_GET['success'];?>
     </div>
     <?php } ?>
    
</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>

</tr>
</thead>
<tbody>
<?php
    foreach($products as $product){
        ?>
        <tr> 
            <td><?php echo $product['id'];?></td>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $product['category_name'];?></td>
            <td> Rs.<?php echo number_format($product['price'],2);?></td>
            <td><?php echo $product['status']==1?'Active':'Inactive';?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $product['id'];?>">Edit</a>
                <a 
                 onclick="return confirm('Are you sure to delete this $product?');"
                href="delete_product.php?id=<?php echo $product['id'];?>">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
</div>

</div>
</div>
</div>

</div>
<div class="footer border-top">
    Copyright @ Swastik Ecommerce
</div>
</div>
</body>
</html>