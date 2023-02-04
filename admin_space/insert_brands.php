<?php
include('../include/connect.php');

if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];

    //to check whether the category is already present in the table
    $select_query="Select * from `brands` where brand_title='$brand_title'";
    $result_select=mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);
    

    // the 'empty' module below checks that the input field must not be empty
    if(empty($_POST['brand_title'])) {
        echo "<script>alert('Input field cannot be empty!');</script>";
      } else {
        if($number >0){
            echo "<script>alert('This brand is already present inside the database')</script>";
        }
        else{
            //the parameter that is used inside the brackets must be the same name as in the database table column name
                $insert_query="INSERT into `brands` (brand_title) VALUES ('$brand_title')";
                $result=mysqli_query($con, $insert_query);
                if($result){
                    echo "<script>alert('Brand has been added successfully')</script>";
                 }
            }
           
            }
      }


   
    

    
?>

<form action="" method="post" class="mb-2 mt-5">
    <div class="input-group mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" >
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <!-- <button type="button" class="btn bg-info p-2 my-3 border-0">Insert Brands</button> -->
        <input type="submit" value="Insert Brands"class="bg-info border-0 p-2 my-3" name="insert_brand" placeholder="Insert Brand" >
                          
    </div>
</form>