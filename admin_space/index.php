<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .footer{
            position: absolute;
            bottom:0;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="navbar navbar-expand-lg navbar-light bg-info" >
            <div class="container-fluid ">
                <a class="navbar-brand" href="#"><strong>DALTON STORES</strong></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                             <a class="nav-link active" href="#">Welcome Guest</a>
                             
                            
                        </li>
                    </ul>
                </nav>

               

            </div>
        </div>

         <!-- Second child -->
         <div class="bg-light">
                    <h3 class="text-center p-2"> Manage details</h3>
                </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center" >
                <div>
                    <a href="#"><img src="../images/fruits/pineapple.jpg" alt="" class="admin-image"></a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center">
                    <!-- 'button*10>a.nav-link.text-light.bg-info.my-1' =>Emmet To create ten buttons on a whole -->
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="insert_products.php" class="nav-link text-dark">Insert Products</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">View Products</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="index.php?insert_category" class="nav-link text-dark">Insert Categories</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">View Categories</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="index.php?insert_brands" class="nav-link text-dark">Insert Brands</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">View Brands</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">All Orders</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">All Payments</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">List Users</a></button>
                    <button type="button" class="btn btn-info mx-1 my-1 "><a href="" class="nav-link text-dark">Logout</a></button>
                   
                 </div>
            </div>
            
        </div>

        <!-- Fourth child -->
        <div class="container">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }

            if(isset($_GET['insert_brands'])){
                include('insert_brands.php');
            }
            ?>
        </div>
        <!--Last child -->
        <div class="bg-info p-3 text-center footer">
            <p>All right reserved to TIMOTHY DALTON ENTERPRISE</p>
          </div>
    </div>
    
</body>
</html>