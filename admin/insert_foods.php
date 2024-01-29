<?php
include("../component/connect.php");

    if(isset($_POST["insert_food"])){
        $food_title=$_POST["food_title"];
        $food_description=$_POST["food_description"];
        $food_price=$_POST["food_price"];
        $food_keywords=$_POST["food_keywords"];
        $food_category=$_POST["food_category"];
        $product_status='true';

        //accessing images
        $filename=$_FILES["food_image"]["name"];
        $tempfile=$_FILES["food_image"]["tmp_name"];
        $folder="product_images/".$filename;

        $insert_query="insert into foods (food_title,food_description,food_price,category_id,food_image,food_keywords,date,status) values ('$food_title','$food_description','$food_price','$food_category','$filename','$food_keywords',Now(),'$product_status')";
        if($food_title=="" or $filename=="" or $food_description=="" or $food_keywords=="" or $food_category=="" or $food_price==""){
            echo "<script>alert('please fill all the available fields')</script>";
            exit();
        }else{
            $result_query=mysqli_query($conn,$insert_query);
            move_uploaded_file($tempfile,$folder);
            if($result_query){
                echo "<script>alert('Food is inserted successfully!')</script>";
                echo "<script>window.open('./home.php?view_foods','_self')</script>";
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <section class="insert-container">
        <h1>Insert Foods</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <!-- title  -->
            <div class="input-box">
                <label for="food_title" >Food title</label><br>
                <input type="text" name="food_title" id="food_title" placeholder="Enter food title" autocomplete="off" required>
            </div>
            <!-- description  -->
            <div class="input-box">
                <label for="description" >Food description</label><br>
                <input type="text" name="food_description" id="description" placeholder="Enter food description" autocomplete="off" required>
            </div>
            <!-- price  -->
            <div class="input-box">
                <label for="food_price" >Food price</label><br>
                <input type="text" name="food_price" id="food_price" placeholder="Enter food price" autocomplete="off" required>
            </div>
            <!-- category -->
            <div class="input-box">
                <label for="food_category">Food Category</label><br>
                <select name="food_category" id="food_category" required>
                    <option value="">Select a Category</option>
                    <?php 
                        $select_query = "select * from categories";
                        $result_select = mysqli_query($conn, $select_query);
                        while ($row = mysqli_fetch_assoc($result_select)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- image  -->
            <div class="input-box">
                <label for="food_image">Food Image</label><br>
                <input type="file" name="food_image" id="food_image" required>
            </div>
            <!-- keywords -->
            <div class="input-box">
                <label for="food_keywords">Food Keywords</label><br>
                <input type="text" name="food_keywords" id="food_keywords" placeholder="Enter food keywords" autocomplete="off" required="required">
            </div>
            <div class="input-box">
                <input type="submit" name="insert_food" class="btn btn-dark" value="Insert Foods">
            </div>
        </form>
    </section>
</body>
</html>