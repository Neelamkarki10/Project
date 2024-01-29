<?php
include("connect.php");
function getfoods(){
    global $conn;
    $select_query="select * from foods order by rand() limit 0,6";
    $select_result=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($select_result)){
        $food_id= $row["food_id"];
        $food_title= $row["food_title"];
        $food_description= $row["food_description"];
        $food_price= $row["food_price"];
        $food_image= $row["food_image"];
        $category_id= $row["category_id"];
        // echo $food_title;
        echo "<div class='food-menu-box'>
        <div class='food-menu-img'>
            <img src='admin/product_images/$food_image' alt='$food_title' class='img-responsive img-curve'>
        </div>
        <div class='food-menu-desc'>
            <h4>$food_title</h4>
            <p class='food-price'>Rs.$food_price</p>
            <p class='food-detail'>$food_description</p>
            <br>
            
            <a href='./order.php?order_food=$food_id' class='order-btn'>Order Now</a>
        </div>
    </div>";
        
    }
    // cart.php?add_cart=$food_id
}

function get_all_foods(){
    global $conn;
    $select_query="select * from foods order by food_title";
    $select_result=mysqli_query($conn,$select_query);
    while($row=mysqli_fetch_assoc($select_result)){
        $food_id= $row["food_id"];
        $food_title= $row["food_title"];
        $food_description= $row["food_description"];
        $food_price= $row["food_price"];
        $food_image= $row["food_image"];
        $category_id= $row["category_id"];
        // echo $food_title;
        echo "<div class='food-menu-box'>
        <div class='food-menu-img'>
            <img src='admin/product_images/$food_image' alt='$food_title' class='img-responsive img-curve'>
        </div>
        <div class='food-menu-desc'>
            <h4>$food_title</h4>
            <p class='food-price'>Rs.$food_price</p>
            <p class='food-detail'>$food_description</p>
            <br>

            <a href='./order.php?order_food=$food_id' class='order-btn'>Order Now</a>
        </div>
    </div>";
    }
}

function getcategories(){
    global $conn;
    $select_category="select * from categories";
    $result_select=mysqli_query($conn,$select_category);
    while($row=mysqli_fetch_assoc($result_select)){
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
        $category_image = $row['category_image'];
        echo "<div class='cat-container'>
        <img src='./admin/category_images/$category_image' alt='$category_title'>
        <h3>$category_title</h3>
        <a href='category-foods.php?category=$category_id'>
            <input type='submit' name='viewmore' value='View Category' class='view-btn'>
        </a>
    </div>";
    }
}

function get_unique_category(){
    global $conn;
    if(isset($_GET['category'])){
        if(isset($_GET["category"])){
            $category_id=$_GET["category"];
        $select_query="select * from foods where category_id=$category_id";
        $select_result=mysqli_query($conn,$select_query);
        $num_of_row=mysqli_num_rows($select_result);
        if($num_of_row == 0){
            echo "<h3 style='color: red '>No food items is present for this category!</h3> ";
        }
        while($row=mysqli_fetch_assoc($select_result)){
            $food_id= $row["food_id"];
            $food_title= $row["food_title"];
            $food_description= $row["food_description"];
            $food_price= $row["food_price"];
            $food_image= $row["food_image"];
            $category_id= $row["category_id"];
            // echo $food_title;
            echo "<div class='food-menu-box'>
            <div class='food-menu-img'>
                <img src='admin/product_images/$food_image' alt='$food_title' class='img-responsive img-curve'>
            </div>
            <div class='food-menu-desc'>
                <h4>$food_title</h4>
                <p class='food-price'>Rs.$food_price</p>
                <p class='food-detail'>$food_description</p>
                <br>

                <a href='./order.php?order_food=$food_id' class='order-btn'>Order Now</a>
            </div>
        </div>";
        }
    }
    }
}

// searching foods 
function search_food(){
    if(isset($_POST["search_data"])){
        global $conn;
        $search_food= $_POST["search_food"];
        $search_query= "select * from foods where food_keywords like '%$search_food%'";
        $search_result=mysqli_query($conn,$search_query);
        $num_of_row=mysqli_num_rows($search_result);
        if($num_of_row == 0){
            echo "<h3 style='color: red '>No results matched!!!</h3> ";
        }
        while($row=mysqli_fetch_assoc($search_result)){
            $food_id= $row["food_id"];
            $food_title= $row["food_title"];
            $food_description= $row["food_description"];
            $food_price= $row["food_price"];
            $food_image= $row["food_image"];
            $category_id= $row["category_id"];
            echo "<div class='food-menu-box'>
            <div class='food-menu-img'>
                <img src='admin/product_images/$food_image' alt='$food_title' class='img-responsive img-curve'>
            </div>
            <div class='food-menu-desc'>
                <h4>$food_title</h4>
                <p class='food-price'>Rs.$food_price</p>
                <p class='food-detail'>$food_description</p>
                <br>

                <a href='./order.php?order_food=$food_id' class='order-btn'>Order Now</a>
            </div>
        </div>";
        }
    }   
}

//cart
function cart(){
    if(isset($_GET['add_cart'])){
        global $conn;
        $get_food_id= $_GET['add_cart'];
        $select_query= "select * from cart where food_id=$get_food_id";
        $select_result=mysqli_query($conn,$select_query);
        $num_of_row=mysqli_num_rows($select_result);
        if($num_of_row > 0){
            echo"<script>alert('Item is alerady present in the cart')</script>";
            echo"<script>window.open('index.php''_self')</script>";
        }else{
            $insert_query= "insert into cart_details (food_id,quantity)values($get_food_id,0)";
            $insert_result=mysqli_query($conn,$insert_query);
            echo "<script>window.open('index.php''_self')</script>";
            // if($insert_result){
            //     echo "<script>alert('Item is alerady present in the cart')</script>";
            // }
        }
    }
}

function get_user_order_details(){
    global $conn;
    $username=$_SESSION['username'];
    $select_orders="select * form tbl_user where username ='$username'";
    $select_result=mysqli_query($conn,$select_orders);
    while($row_data=mysqli_fetch_assoc($select_result)){
        $user_id=$row_data['user_id'];
    }
}


?>
<html></html>