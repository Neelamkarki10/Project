<?php
    include("../component/connect.php");
    // include("../component/functions.php");

    if(isset($_POST['register_btn'])){
        $user_name=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['password'];
        $hash_value=password_hash($user_password,PASSWORD_DEFAULT);
        $confirm_password=$_POST['confirm_pass'];
        $user_address=$_POST['address'];
        $user_contact=$_POST['contact'];

        $select_query="select * from tbl_user where username='$user_name' or user_email='$user_email'";
        $result=mysqli_query($conn,$select_query);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0){
            echo "<script>alert('User name and email address already exists!!')</script>";
        }else if ($user_password!=$confirm_password){
            echo "<script>alert('Password do not matched!!')</script>";
        }else{
            $insert_query="insert into tbl_user (username,user_email,user_password,user_address,user_contact,date)values('$user_name','$user_email','$hash_value','$user_address','$user_contact',Now())";
            $execute_query=mysqli_query($conn,$insert_query);
            if($execute_query){
                echo "<script>alert('Data inserted successfully!!')</script>";
                echo"<script>window.open('./user_login.php','_self')</script>";
            }else{
                die("mysqli_error($conn)");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <section class="registration">
        <form action="" method="post" class="form">
            <h1>New User Registration</h1>
            <!-- name  -->
            <div class="input-box">
                <label for="username" >Username</label><br>
                <input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required>
            </div>
            <!-- email  -->
            <div class="input-box">
                <label for="email" >Email</label><br>
                <input type="email" name="user_email" id="email" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <!-- password  -->
            <div class="input-box">
                <label for="password" >Password</label><br>
                <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required>
            </div>
            <!-- confirm password  -->
            <div class="input-box">
                <label for="confirm_pass" >Confirm Password</label><br>
                <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm password" autocomplete="off" required>
            </div>
            <!-- address  -->
            <div class="input-box">
                <label for="address" >Address</label><br>
                <input type="text" name="address" id="address" placeholder="Enter your address" autocomplete="off" required>
            </div>
            <!-- contact  -->
            <div class="input-box">
                <label for="contact" >Contact</label><br>
                <input type="text" name="contact" id="contact" placeholder="Enter your contact" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="submit" name="register_btn" class="register_btn" value="Register"/>
                <p>Already have an account? <a href="user_login.php">Login</a></p>
            </div>
        </form>
    </section>

</body>
</html>


    