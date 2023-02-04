<!-- Connect php -->
<?php
include('./include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaja Maligai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body><!--Navbar-->
    <div class="container-fluid p-0">
        <!--First child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><strong>DALTON STORES</strong></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Products</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" href="#">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Contact</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link active" href="#">Total Price : 100</a>
                  </li>
                  
               
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="find">
                  <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
              </div>
            </div>
          </nav>

          <!-- Second Child-->
          <nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                    <a class="nav-link active" href="#">Welcome Guest</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link active" href="#">Login</a>
                  </li>
            </ul>
          </nav>

          <!-- Third child -->
          <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Get groceries from your place!</p>
          </div>

          <!-- Fourth child -->
          <div class="row">
            <!-- HTML for left side menu -->
            <!-- 'col-md-2' is 2 parts out of 12 part -->
            <div class="col-md-2 bg-secondary p-0">
              <!-- ul for brands to be fetched from DB and to be displayed -->
              <ul class="navbar-nav me-auto text-center">
                  <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#"> <b>DELIVERY BRANDS</b> </a>
                  </li>

                  <!-- to display the brands from database to the main home page brand menu -->
                  <?php
                  $select_brands = "Select * from `brands`";
                  $result_brands = mysqli_query($con, $select_brands);
                  while($row_data = mysqli_fetch_assoc($result_brands)){
                    $brand_title=$row_data['brand_title'];
                    $brand_id=$row_data['brand_id'];
                    echo "<li class='nav-item '>
                    <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_title</a>
                  </li>";
                    
                  }
                  ?>
              </ul>

              <!-- ul for categories to be fetched from DB and to be displayed -->
              <ul class="navbar-nav me-auto text-center">
                  <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#"><b>CATEGORIES</b></a>
                  </li>
                  <!-- to display the categories from database to the main home page category menu -->
                  <?php
                  $select_categories="select * from `categories`";
                  $result_categories=mysqli_query($con, $select_categories);
                  while($row_data = mysqli_fetch_assoc($result_categories)){
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    echo "<li class='nav-item '>
                    <a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>
                </li>";
                  }
                  ?>

              </ul>
            
            </div>


            <!-- HTML for cards  -->
               
            <div class="col-md-10">   <!-- 'col-md-10' is 10 parts out of 12 part -->
              <div class="row">
                  <!-- Fetching products from database to homepage cards-->
                  <?php
                  $select_query="select * from `products` order by rand() limit 0,9 "; 
                  //order by product_title -- arranges the cards in order based on title
                  //order by rand() -- random order
                  //order by rand() limit 0,5 -- random order that displays only 5 products
                  $result_query=mysqli_query($con, $select_query);

                  while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    // For Eg: 'product_id' is the column name in the database
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image_1'];
                    $product_category_id=$row['category_id'];
                    $product_brand_id=$row['brand_id'];
                    $product_price=$row['product_price'];

                    echo "<div class='col-md-3 mb-2'>
                    <div class='card' >
                      <img src='./admin_space/product_images/$product_image1' id='card_image' class='card-img-top'  alt='$product_title'>
                      <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-info'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                      </div>
                    </div>
                  </div>";
                  }
                  ?>

              </div>
            </div>
          </div>


          <!--Last child -->
          <div class="bg-info p-3 text-center">
            <p>All right reserved to TIMOTHY DALTON ENTERPRISE</p>
          </div>
    </div>
</body>
</html>