<?php
require_once "./logincheck.php"; 

$stmt= $con->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$uploadPath="../products_images";

if($_SERVER['REQUEST_METHOD']=== 'POST'){
      //handle login submit
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category_id= $_POST['category_id'];
      $description = $_POST['description'];
      $status=$_POST['status'];

       $imageName=null;
      if(is_uploaded_file($_FILES['image_name']['tmp_name'])){
        $imageName=$_FILES['image_name']['name'];
        move_uploaded_file($_FILES['image_name']['tmp_name'],$uploadPath . "/" . $imageName);
      
      }
    
      

      $sql="INSERT INTO products SET
      sku='$sku',
      name='$name',
      price=$price,
      image_name='$imageName',
      category_id=$category_id,
      description='$description',
      status=$status";

      $catStmt= $con->prepare($sql);
      $catStmt->execute();
  //redirect the user to category listing page
  header("Location:products.php?success=Product added successfully.");
  die;
}
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
<h2>Products</h2>
<div class="card-header">
Add New Products
</div>
<div class="card-body">


<form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label for="name">SKU:</label>
<input type="text" name="sku" class="form-control" id="sku">
</div>
<div class="form-group">
<label for="name">Name:</label>
<input type="text" required name="name" class="form-control" id="name">
</div>
<div class="form-group">
<label for="category_id">Category:</label>
<select name="category_id" id="category_id" class="form-control">
    <option value="">Select Category</option>
    <?php foreach($categories as $category){ ?>
     <option value="<?php echo $category['id'];?>"> <?php echo $category['name'];?></option>
     <?php } ?>
</select>
</div>

<div class="form-group">
  <label for="name">Price:</label>
  <input type="number" min="0" name="price" class="form-control" id="price">
</div>
<div class="form-group">
  <label for="image_name">Image:</label>
  <input type="file" accept=".jpg,.jpeg,.png"  name="image_name" class="form-control" id="image_name">
</div>
<div class="form-group">
<label for="description">Description:</label>
<textarea rows="5" name="description" id="description" class="form-control"></textarea>
</div>
<div class="form-control">
<label for="status">Status:</label>
<select name="status" id="status" class="form-control">
    <option value="">Select status</option>
    <option value="1">Active</option>
    <option value="0">Inactive</option>
</select>
</div>
<button type="submit" class="btn btn-primary">Save</button>
<a href="products.php" class="btn btn-secondary">Cancel</a>
</form>


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