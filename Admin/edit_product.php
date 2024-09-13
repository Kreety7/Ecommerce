<?php
require_once"./logincheck.php";


  if(!isset($_GET['id'])) {
    //die("Please provide a valis ID for the category.");
    header("Location:products.php?error=Please provide a valid ID for the product");
    die;
  }

  $id=(int)$_GET['id'];
$sql="SELECT * FROM products where id=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$product=$stmt->fetch(PDO::FETCH_ASSOC);
 if (!$product){
  header("Location:products.php?error=Please provide a valid ID for the product");
  die;
 }
//print_r($category);
//die;

$stmt= $con->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);



if($_SERVER['REQUEST_METHOD']==='POST') {
    $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category_id= $_POST['category_id'];
      $description = $_POST['description'];
      $status=$_POST['status'];

      $sql="UPDATE products SET
      sku='$sku',
      name='$name',
      price=$price,
      category_id=$category_id,
      description='$description',
      status=$status
   WHERE id=$id";
//    echo $sql;
//    die;

    $catStmt=$con->prepare($sql);
    $catStmt->execute();

   header("Location:products.php?success=product updated sucessfully");
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
    <h2>products</h2>
    <div class="card">
        <div class="card-header"> 
            Edit product
        <a href="add_product.php" class="btn btn-primary btn-sm">Add new</a>

        <div class="card-body">
            <form method="post" action="">
  <div class="form-group">
  <label for="sku">Sku:</label>
    <input value="<?php echo $product['sku'];?>"
    type="text" name="sku" class="form-control" id="sku">
     </div>
     <div class="form-group">
    <label for="name">Name:</label>
    <input value="<?php echo $product['name'];?>"
    type="text" name="name" class="form-control" id="name">
     </div>
     <div class="form-group">
<label for="category_id">Category:</label>
<select name="category_id" id="category_id" class="form-control">
    <option value="">Select Category</option>
    <?php foreach($categories as $category){ ?>
     <option
      <?php echo $product['category_id']==$category['id']? 'selected':'';?> value="<?php echo $category['id'];?>"> <?php echo $category['name'];?></option>
     <?php } ?>
</select>
</div>
     <div class="form-group">
    <label for="price">Price:</label>
    <input value="<?php echo $product['price'];?>"
    type="text" name="price" class="form-control" id="price">
     </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description" id="description" class="form-control"><?php echo $product['description'];?></textarea>
  </div>
  <div class="form-group">
    <label for ="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="">select status</option>
        
        <option <?php echo $product['status']=='1'? 'selected':'';?> value="1">Active</option>
        <option <?php echo $product['status']=='0'?  'selected':'';?> value="0">Inactive</option>
</select>
        
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="products.php" class="btn btn-secondary">Cancel</a>
</form>
</div>
</div>
<div class="footer border-top">
     copyright @Swastik Ecommerce
    </div>
</body>
</html>
            
