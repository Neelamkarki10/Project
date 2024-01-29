<?php
include("../component/connect.php");

if (isset($_GET['edit_food'])){
    $edit_id = $_GET['edit_food'];
    // echo''.$edit_id.'';
    $select_food = "select * from foods where food_id=$edit_id";
    $result_select=mysqli_query($conn,$select_food);
    $row_select=mysqli_fetch_assoc($result_select);
    $food_title = $row_select['food_title'];
    $food_description = $row_select['food_description'];
    $food_price = $row_select['food_price'];
    $category_id = $row_select['category_id'];
    $food_image = $row_select['food_image'];
    $food_keywords = $row_select['food_keywords'];
    
    //fetching categories
    $select_category="select * from categories where category_id=$category_id";
    $result_category=mysqli_query($conn,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title= $row_category["category_title"];
}

?>

<section class="insert-container">
        <h1>Edit Foods</h1>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <!-- title  -->
            <div class="input-box">
                <label for="food_title" >Food title</label><br>
                <input type="text" name="food_title" id="food_title" placeholder="Enter food title" value="<?php echo $food_title?>" autocomplete="off" required>
            </div>
            <!-- description  -->
            <div class="input-box">
                <label for="description" >Food description</label><br>
                <input type="text" name="food_description" id="description" placeholder="Enter food description" value="<?php echo $food_description?>" autocomplete="off" required>
            </div>
            <!-- price  -->
            <div class="input-box">
                <label for="food_price" >Food price</label><br>
                <input type="text" name="food_price" id="food_price"  value="<?php echo $food_price?>"  placeholder="Enter food price" autocomplete="off" required>
            </div>
            <!-- category -->
            <div class="input-box">
                <label for="food_category">Food Category</label><br>
                <select name="food_category" id="food_category" required>
                    <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                    <?php
                        $select_all="select * from categories ";
                        $result_all=mysqli_query($conn,$select_all);
                        while($row_all=mysqli_fetch_assoc($result_all)){
                            $category_title= $row_all["category_title"];
                            $category_id=$row_all["categoty_id"];
                            echo "<option value='$category_id'>$category_title</option>";
                        };
                    ?>
                </select>
            </div>
            <!-- image  -->
            <div class="input-box">
                <label for="food_image">Food Image</label><br>
                <input type="file" name="food_image" id="food_image" required>
                <img src="./product_images/<?php echo $food_image?>" alt="image" class="edit-image"/>
            </div>
            <!-- keywords -->
            <div class="input-box">
                <label for="food_keywords">Food Keywords</label><br>
                <input type="text" name="food_keywords" id="food_keywords" placeholder="Enter food keywords" value="<?php echo $food_keywords?>" autocomplete="off" required="required">
            </div>
            <div class="input-box">
                <input type="submit" name="edit_food" class="btn btn-dark" value="Update Foods">
            </div>
        </form>
    </section>

    <!-- updating code  -->
    <?php

        if(isset($_POST["edit_food"])){

            $food_title=$_POST["food_title"];
            $food_description=$_POST["food_description"];
            $food_price=$_POST["food_price"];
            $food_category=$_POST["food_category"];
            $food_keywords=$_POST["food_keywords"];

            $food_image=$_FILES["food_image"]["name"];
            $temp_image=$_FILES["food_image"]["tmp_name"];
            $folder="./product_images/".$food_image;

            $update_query= "update foods set food_title='$food_title',food_description='$food_description',food_price='$food_price',category_id='$product_category',food_image='$food_image',food_keywords='$food_keywords',date=Now() where food_id=$edit_id";
            $result_update=mysqli_query($conn,$update_query);
            move_uploaded_file($temp_image,$folder);
            if($result_update){
                echo "<script>alert('Food updated successfully!')</script>";
                echo "<script>window.open('./home.php?view_foods','_self')</script>";
            }
        }

?>