<?php

$server = "localhost" ;
$userName = "root" ;
$dbName = "my_database" ;
$password = "" ;

$con = mysqli_connect($server, $userName, $password, $dbName) ;

// if(mysqli_connect_errno()){
//   echo "Not Connected" ;
// }else{
//   echo "Connected SuccessFully" ;
// }

if(isset($_POST['submit'])){

  $ProductNmae =$_POST['product_name'];
  $ProductPrice =$_POST['product_price'] ;

  $sql = "INSERT INTO `user_store`(`product_name`, `product_price`, `date`) VALUES ('$ProductNmae','$ProductPrice',current_timestamp())" ;
  
  $result= mysqli_query($con,$sql) ;
  if($result){
    echo "Data Added Successfully" ;
    header('location:curd.php') ;
  }else{
    echo "Data Not Added" ;
  }


  }


  // delete code 

?>

<?php

if(isset($_GET['d_id'])){
  $deleteid =$_GET['d_id'] ;
  $sql = "DELETE FROM `user_store` WHERE id= $deleteid" ;
 $result = mysqli_query($con,$sql) ;
 if($result){
  header('location:curd.php') ;
 }


}


?>





<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
  <body>

  <!-- nav bar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark main">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">MY SToRe</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Service's</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

  <!-- nav bar -->


  <!-- curd form -->

  <div class="container mt-5">
    <h3 class="pb-2 text-secondary">List Your Product To Store</h3>
  <form action="curd.php" method="post">
  <div class="mb-3">
    <label for="product_name" class="form-label">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" required>
  </div>
  <div class="mb-3">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" class="form-control" id="product_price" name="product_price" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
</form>



  </div>

  <!-- curd form -->


   <!-- Store Data get -->


   <div class="container mt-5">

   <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">L - Date</th>
    </tr>
  </thead>
  <tbody>
  <?php

$sql = "SELECT * FROM user_store" ;
$result = mysqli_query($con,$sql) ;

foreach($result as $item){
  $id = $item['id'] ;
  $product_name =$item['product_name'] ;
  $product_price =$item['product_price'] ;
  $listing_date=$item['date'] ;

  echo "  <tr>
      <td>$id</td>
      <td>$product_name</td>
      <td> $product_price</td>
      <td>$listing_date</td>
      <td> 
      <span class='btn btn-success'><a href='edit.php?e_id=$id' class='text-white text-decoration-none'>Edit</a></span>
      <span class='btn btn-danger'><a href='curd.php?d_id=$id' class='text-white text-decoration-none'>Delete</a></span>
      </td>
    </tr>" ;


}


?>
  
  </tbody>
</table>

   </div>







   <!-- Store Data get -->


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>