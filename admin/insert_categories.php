<?php 
    include("../component/connect.php");
    
    if(isset($_POST["insert_cat"])){
        $category_title = $_POST['cat_title'];
        $category_image = $_FILES["cat_image"]["name"];
        $tempfile = $_FILES["cat_image"]["tmp_name"];
        $folder = "./category_images/".$category_image;

        $select_query = "select * from categories where category_title='$category_title'";
        $result_select = mysqli_query($conn, $select_query);
        $number = mysqli_num_rows($result_select);
        if($number > 0){
            echo "<script>alert('This category is presentd!')</script>";
        }else{
            $insert_query= "insert into categories (category_title,category_image) values('$category_title','$category_image')";
            $result=mysqli_query($conn,$insert_query);
            move_uploaded_file($tempfile,$folder);
            if($result){
                echo "<script>alert('Category is inserted successfully!')</script>";
                echo "<script>window.open('./home.php?view_categories','_self')</script>";
            }
        }
    }
?>

        <link rel="stylesheet" href="css/style.css">
   
    <div class="cat-container">
        <h4>Insert Categories</h4>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <!-- category title  -->
            <div class="cat-input">
                <input type="text" name="cat_title" id="" placeholder="Insert Category" required autocomplete="off">
            </div>
            <!-- category image  -->
            <div class="cat-input">
                <input type="file" name="cat_image" id="cat_image"  required>
            </div>
            <div class="cat-input">
                <input type="submit" name="insert_cat" value="Insert Category">
            </div>
    </form>
    </div>






