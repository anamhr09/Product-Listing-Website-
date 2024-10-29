
<?php

$server = "localhost" ;
$userName = "root" ;
$dbName = "my_database" ;
$password = "" ;

$con = mysqli_connect($server, $userName, $password, $dbName) ;

if($_GET['e_id']){
$get_id = $_GET['e_id'] ;

$sql = "SELECT * FROM user_store WHERE id = $get_id";
$result = mysqli_query($con,$sql) ;

$data = mysqli_fetch_assoc($result) ;
 $id =$data['id'] ;
 $product_name =$data['product_name'] ;
 $product_price =$data['product_price'] ;


}


if(isset($_POST['edit'])){

 $id =$_POST['id'] ;
 $p_name =$_POST['product_name'] ;
 $p_price=$_POST['product_price'] ;

$sql1 = "UPDATE user_store SET product_name='$p_name', product_price='$$p_price' WHERE id='$id' " ;
$result1=mysqli_query($con,$sql1) ;
if($result1){
    echo "Data Updated" ;
    header('location:curd.php') ;
}else{
    echo "Data Is Not Updated" ;
}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container mt-5">
    <h3 class="pb-2 text-secondary">List Your Product To Store</h3>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <div class="mb-3">
    <label for="product_name" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name  ?>" required>
  </div>
  <div class="mb-3">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price  ?>" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $id  ?>" hidden required>
  </div>
  <button type="submit" class="btn btn-primary" name="edit">Edit</button>
</form>



  </div>


</body>
</html>