
<?php
//Connect php 
include('../include/connect.php');


if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['Product_category'];
    $product_brand=$_POST['Product_brand'];
    $product_price=$_POST['product_price'];

    //for status just writing true
    $product_status='true';

    // Image access
        //Since the images are'file' type, instead of using post use '$_FILE'
    $product_image1=$_FILES['product_image_1']['name'];
    $product_image2=$_FILES['product_image_2']['name'];
    $product_image3=$_FILES['product_image_3']['name'];

     // Image access with temp name
     $temp_image1=$_FILES['product_image_1']['tmp_name'];
     $temp_image2=$_FILES['product_image_2']['tmp_name'];
     $temp_image3=$_FILES['product_image_3']['tmp_name'];



     //Checking empty conditions
     if($product_title='' or $product_description='' or $product_keywords='' or $Product_category='' or
        $Product_brand='' or $product_price='' ){
            echo "<script>alert('Empty fields must be filled!')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            //insert query
                //for getting the exact date, NOW() function is used
            $insert_products="INSERT INTO `products` (product_title,product_description,product_keyword,category_id,brand_id,product_image_1,product_image_2,product_image_3,product_price,date,status) VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),$product_status')";

            $result=mysqli_query($con, $insert_products);

            if($result){
                echo "<script>alert('Product has been stored to the database')</script>";
            }
        }
}
?>

<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-3">
        <h3 class="text-center">INSERT PRODUCTS</h3>
        
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Product title -->
             <div class="form-outline w-50 m-auto mb-4">
                   <label for="product_title" class="form-label">Product Title</label>
                   <input type="text" class="form-control" name="product_title" 
                id="product_title" placeholder="Enter Product Title" auto-complete="off"
                 required="required">
              </div>

              <!-- Product description -->
              <div class="form-outline w-50 m-auto mb-4">
                   <label for="product_description" class="form-label">Product Description</label>
                   <input type="text" class="form-control" name="product_description" 
                id="product_description" placeholder="Enter Product Description" auto-complete="off"
                 required="required">
              </div>

              <!-- Product Keyword -->
              <div class="form-outline w-50 m-auto mb-4">
                   <label for="product_keyword" class="form-label">Product Keyword</label>
                   <input type="text" class="form-control" name="product_keywords" 
                id="product_keyword" placeholder="Enter Product Keyword" auto-complete="off"
                 required="required">
              </div>

              <!-- Select Category -->
              <div class="form-outline w-50 m-auto mb-4">
                    <select name="Product_category" id="" class="form-select">
                        <option value="">Select a category </option>


                        <?php
                  $select_query = "Select * from `categories`";
                  $result_query = mysqli_query($con, $select_query);
                  while($row_data = mysqli_fetch_assoc($result_query)){
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo "
                    <option value='$category_id'>$category_title </option>";
                  }
                  ?>
                    
                    </select>
              </div>

              <!-- Select Brands -->
              <div class="form-outline w-50 m-auto mb-4">
                    <select name="Product_brand" id="" class="form-select">
                        <option value="">Select a Brand </option>
                        <?php
                            $select_query="Select * from `brands`";
                            $result_query=mysqli_query($con, $select_query);
                            while($row_data=mysqli_fetch_assoc($result_query)){
                                $brand_title=$row_data['brand_title'];
                                $brand_id=$row_data['brand_id'];
                                echo "<option value='$brand_id'>$brand_title </option>";
                            }
                        ?>
                       
                    </select>
              </div>

              <!-- Product Image 1 -->
              <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image_1">Product Image 1</label>
                <input type="file" name="product_image_1" id="product_image_1"
                 class="form-control" required="required">
              </div>

              <!-- Product Image 2 -->
              <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image_2">Product Image 2</label>
                <input type="file" name="product_image_2" id="product_image_2"
                 class="form-control" required="required">
              </div>

              <!-- Product Image 3-->
              <div class="form-outline w-50 mb-4 m-auto">
                <label for="product_image_3">Product Image 3</label>
                <input type="file" name="product_image_3" id="product_image_3"
                 class="form-control" required="required">
              </div>


              <!-- Product price -->
              <div class="form-outline m-auto mb-4 w-50">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" class="form-control" name="product_price" id="product_price"
                placeholder="Enter product price" autocomplete="off" required="required">
              </div>

              <!-- Submit button -->
              <div class="form-outline m-auto mb-4 w-50">
                <input type="submit" name="insert_product" class="btn btn-info" value="Insert product">
              </div>


              
            
        </form>
    </div>
</body>
</html>