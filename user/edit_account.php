<?php
    if(isset($_GET['edit_account'])){
        $username=$_SESSION["username"];

        //select user details
        $select_user="select * from tbl_user where username='$username'";
        $result_select=mysqli_query($conn,$select_user);
        $row_data=mysqli_fetch_assoc($result_select);
        $user_id=$row_data['user_id'];
        $user_name=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_address=$row_data['user_address'];
        $user_contact=$row_data['user_contact'];
        $user_password=$row_data['user_password'];
    }
    if(isset($_POST['update_btn'])){
        $update_id=$user_id;
        $user_name=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        $hash_value=password_hash($user_password,PASSWORD_DEFAULT);
        $user_address=$_POST['address'];
        $user_contact=$_POST['contact'];

        //update query
        $update_query="update tbl_user set username='$user_name',user_email='$user_email',user_password='$hash_value',user_address='$user_address',user_contact='$user_contact',date=Now() where user_id=$update_id";
        $result_query_update=mysqli_query($conn,$update_query);
        if($result_query_update){
            echo "<script>alert('User account is successfully updated!!')</script>";
            echo"<script>window.open('logout.php','_self')</script>";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Edit Your account</h3>
    <div class="edit-account">
        <form action="" method="post" class="form">
            <!-- name  -->
            <div class="input-box">
                <input type="text" name="username" value="<?php echo $user_name ?>" placeholder="Enter your username" autocomplete="off" required>
            </div>
            <!-- email  -->
            <div class="input-box">
                <input type="email" name="user_email" value="<?php echo $user_email ?>" placeholder="Enter your email" autocomplete="off" required>
            </div>
            <!-- password  -->
            <div class="input-box">
                <input type="password" name="user_password" value="<?php echo $user_password ?>" placeholder="Enter your password" autocomplete="off" required>
            </div>
            <!-- address  -->
            <div class="input-box">
                <input type="text" name="address" value="<?php echo $user_address ?>" placeholder="Enter your address" autocomplete="off" required>
            </div>
            <!-- contact  -->
            <div class="input-box">
                <input type="text" name="contact" value="<?php echo $user_contact ?>" placeholder="Enter your contact" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="submit" name="update_btn" class="register_btn" value="Update"/>
            </div>
        </form>
    </div>
</body>
</html>

