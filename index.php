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
            <div class="col-md-2 bg-secondary p-0">
              <!-- ul for brands to be fetched from DB and to be displayed -->
              <ul class="navbar-nav me-auto text-center">
                  <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#">Delivery Brands</a>
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
                    <a class="nav-link text-light" href="#">Categories</a>
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
            <!-- HTML for cards  -->
            </div>
            <div class="col-md-10">
               <div class="row">
                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card" >
                    <img src="./images/snacks/oreo.jpg" id="card_image" class="card-img-top"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">OREO</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->

                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card" >
                    <img src="./images/snacks/lays.jpg" id="card_image" class="card-img-top"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">LAYS</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->

                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card " >
                    <img src="./images/snacks/tiger.jpg"  id="card_image" class="card-img-top p-4"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">TIGER BISCUIT</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->

                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card" >
                    <img src="./images/snacks/maggi.jpg" id="card_image" class="card-img-top p-4"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">MAGGI</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->

                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card" >
                    <img src="./images/snacks/mixture.jpg" id="card_image" class="card-img-top p-4"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">MIXTURE</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->

                <!-- card starts -->
                <div class="col-md-3 mb-2">
                  <div class="card" >
                    <img src="./images/snacks/jam.jpg" id="card_image" class="card-img-top p-4"  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">KISSAN JAM</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-info">Add to cart</a>
                      <a href="#" class="btn btn-secondary">View more</a>
                    </div>
                  </div>
                </div>
                <!-- Card ends -->
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