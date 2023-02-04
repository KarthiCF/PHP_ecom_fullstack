<?php
include('../include/connect.php');

if(isset($_POST['insert_cat'])){
    //The code "if(isset($_POST['insert_cat']))" checks if the "insert_cat" value has been posted to the server through a form submission using the HTTP POST method.
    //The "isset" function is a PHP built-in function that determines if a variable has been set and is not NULL. In this case, it is checking if the $_POST['insert_cat'] variable has been set, meaning that the form has been submitted with the "insert_cat" value.
    $category_title = $_POST['cat_title'];

    //to check whether the category is already present in the table
    $select_query="Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con, $select_query);
    $number=mysqli_num_rows($result_select);

    // the 'empty' module below checks that the input field must not be empty
    if(empty($_POST['cat_title'])) {
        echo "<script>alert('Input field cannot be empty!');</script>";
      } else{
        if($number >0){
            echo "<script>alert('This category is already present inside the database')</script>";
        }else{
            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($con, $insert_query);
            if($result){
                echo "<script>alert('category has been added successfully')</script>";
             }
            }
        }
      }
    

    
?>

<form action="" method="post" class="mb-2 mt-5">
    <div class="input-group mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categotries" >
    </div>

    <div class="input-group mb-2 w-10 m-auto">
        <!-- <button type="button" class="btn bg-info p-2 my-3 border-0">Insert categories</button> -->
        <input type="submit" value="Insert categories"class="bg-info border-0 p-2 my-3" name="insert_cat" placeholder="Insert Categotries" >
    </div>
</form>


<!-- 

This code is fetching data from a MySQL database table called "brands" and displaying it on a web page. Here's a step-by-step explanation of what's happening:

$select_brands: A variable that holds the SQL query to select all columns from the "brands" table.

$result_brands: A variable that holds the result set returned from the database after executing the query using mysqli_query function. The first argument is the database connection represented by $con, and the second argument is the query string represented by $select_brands.

while loop: The loop iterates through each row in the result set and performs the operations inside the loop for each row.

mysqli_fetch_assoc function: This function retrieves the next row of data from the result set and returns it as an associative array. The array key names are the column names of the database table. The function is called with the $result_brands as its argument.

$brand_title and $brand_id: These two variables are assigned the values of the brand_title and brand_id columns respectively, from the current row of the result set.

echo statement: This statement is used to display the data on the web page. It creates an HTML list item (<li>) with a link (<a>) inside it. The link points to index.php with the brand ID appended as a query string (?brand=$brand_id). The text of the link is the brand title ($brand_title).

End of the loop: The loop continues to the next row of the result set until all rows have been processed.


 -->