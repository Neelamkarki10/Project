<?php
    include("../component/connect.php");
    session_start();

    if(isset($_POST["login_btn"])){
        $user_name=$_POST['username'];
        $user_password=$_POST['password'];

        // selecting userdetail
        $select_query="select * from tbl_user where username='$user_name'";
        $result=mysqli_query($conn,$select_query); 
        $row_data=mysqli_fetch_assoc($result) ;

        $num_rows=mysqli_num_rows($result);
        if($num_rows> 0){
            $_SESSION['username']=$user_name;
            if(password_verify($user_password,$row_data["user_password"])){
                echo "<script>alert('Login successful!')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }else{
                echo "<script>alert('Invalid Credentials!')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credentials!!')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <section class="registration">
        <form action="" method="post" class="form">
            <h1>User Login</h1>
            <!-- name  -->
            <div class="input-box">
                <label for="username" >Username</label><br>
                <input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required>
            </div>
            
            <!-- password  -->
            <div class="input-box">
                <label for="password" >Password</label><br>
                <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required>
            </div>
            
            <div class="input-box">
                <input type="submit" name="login_btn" class="register_btn" value="Login"/>
                <p>Don't have an account? <a href="user_registration.php">Register</a></p>
            </div>
        </form>
    </section>

</body>
</html>