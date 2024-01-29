<?php
include("./component/connect.php");
session_start();

if (isset($_GET['order_food'])) {
    $food_id= $_GET['order_food'];
    $select_food = "select * from foods where food_id=$food_id";
    $select_result=mysqli_query($conn, $select_food);
    $row_data=mysqli_fetch_assoc($select_result);
    $food_title=$row_data['food_title'];
    $food_price=$row_data['food_price'];
    $food_image=$row_data['food_image'];
    $food_description=$row_data['food_description'];
    $status=$row_data['status'];

    if(!isset($_SESSION["username"])){
        if(isset($_POST['order-submit'])){
            echo "<script>alert('you need to login to make orders')</script>";
            echo "<script>window.open('./user/user_login.php','_self')</script>";
        
        }
    }else{
        if(isset($_POST['order-submit'])){
            
            $food_quantity=$_POST['qty'];
            $user_fullname=$_POST['full-name'];
            $user_contact=$_POST['contact'];
            $user_email=$_POST['email'];
            $delivery_address=$_POST['address'];
            $payment_option=$_POST['payment_option'];
            $order_status='pending';
            $total_price= $food_price*$food_quantity;
            

            
            $select_users="select * from tbl_user where username='".$_SESSION["username"]."'";
            $result_select_users=mysqli_query($conn, $select_users);
            $row_users=mysqli_fetch_assoc($result_select_users);
            $user_id=$row_users['user_id'];
            $username=$_SESSION["username"];

            $insert_query="insert into tbl_orders (user_id,username,food_id,food_price,food_quantity,total_amount,user_fullname,user_email,delivery_address,user_contact,date,order_status) values($user_id,'$username',$food_id,$food_price,$food_quantity,$total_price,'$user_fullname','$user_email','$delivery_address','$user_contact',Now(),'$order_status')";

            $execute_query=mysqli_query($conn,$insert_query);
            if($execute_query){
                echo "<script>alert('Orders is submitted successfully!!')</script>";
                echo "<script>window.open('./user/profile.php','_self')</script>";
            }

            // echo "<script>alert('orders submitted successfully')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- Navbar section starts here -->
    <?php
        include("./component/navbar.php");
    ?>
    <!-- Navbar section ends here -->

    <!-- guest section starts here -->
    <section class="notification">
        <ul >
            <?php
                if(!isset($_SESSION["username"])){
                    echo "<li><a href='#'>Welcome Guest!</a></li>";
                }else{
                    echo "<li><a href='#'>Welcome ".$_SESSION["username"]."!</a></li>";
                }
            ?>
            <?php
                if(!isset($_SESSION["username"])){
                    echo "<li><a href='./user/user_login.php'>Login</a></li>";
                }else{
                    echo "<li><a href='./user/logout.php'>Logout</a></li>";
                }
            ?>
        </ul>
    </section>
    <!-- fOOD order Section Starts Here -->
    <section class="orders">
        <form action="" method="post" class="form">
            <h5>Please fill this form to confirm your order.</h5>
            <p class="para1">Selected Food</p>

            <div class="food_details">
                
                <img src="./admin/product_images/<?php echo $food_image ?>" alt="<?php echo $food_title ?>" class="">
                <div class="food-desc">
                    <div class="desc"><span>Title:</span> <?php echo $food_title ?></div>
                    <div class="desc"><span>Price:</span> <?php echo $food_price ?></div>
                    <div class="desc"><span>Description:</span> <?php echo $food_description ?></div>
                    <div class="desc"><span>Status:</span> <?php echo $status ?></div>
                </div>
            </div>
            <div style="display:flex;justify-content:center;align-items:center;">
                <label class="order-label" style="color:black;font-weight:bold;">Quantity: </label>
                <input type="number" name="qty" required style="padding:5px;width:150px;border:1px solid black;"/>
            </div>
            <div class="delivery_details">
                <h5 id="id1">Delivery Details</h5>
                <div class="input-box">
                    <label class="order-label">Full Name</label>
                    <input type="text" name="full-name" placeholder="Enter your full name.." class="" required>
                </div>
                <div class="input-box">
                    <label class="order-label">Phone Number</label>
                    <input type="text" name="contact" placeholder="E.g. 9843xxxxxx" class="" required>
                </div>
                <div class="input-box">
                    <label class="order-label">Email</label>
                    <input type="email" name="email" placeholder="Enter your email address.." class="" required>
                </div>
                <div class="input-box">
                    <label class="order-label">Address</label>
                    <input type="text" name="address" rows="10" placeholder="Enter your address.." class="input-responsive" required></textarea>
                </div>
                <div class="input-box">
                    <label class="order-label">Payment Options</label><br>
                    <select name="payment_option" required>
                        <option value="">Select payment method</option> 
                        <option value="Cash on delivery">Cash on delivery</option> 
                        <option value="Esewa">Esewa</option> 
                    </select>
                </div>
            </div>
            
            <div class="input-box">
            <input type="submit" name="order-submit" value="Confirm Order"/>
        </form>
    </section>
    <!-- fOOD order Section Ends Here -->

    <!-- footer section starts here -->
    <?php
        include("./component/footer.html");
    ?>
    <!-- footer section ends here -->

</body>
</html>
