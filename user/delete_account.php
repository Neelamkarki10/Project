
    <title>Delete account</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        h3{
            text-align: center;
        }
        .delete-account{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .delete-account .delete-form{
            margin-top: 10px;
            padding: 5rem;
            background: skyblue;
            border-radius: 20px;
        }
        .delete-form .delete-div{
            margin: 10px;
        }
        .delete-account .delete-form .delete-btn{
            padding: 10px 20px;
            border-radius: 10px;
            background: #000;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .delete-form .delete-btn:hover{
            background: orangered;
            color: #fff;
        }
    </style>

    <h3>Delete Your Account</h3>
    <div class="delete-account">
        <form action="" method="post" class="delete-form">
            <div class="delete-div">
                <input type="submit" name="delete_account" value="DELETE ACCOUNT" class="delete-btn" style="padding: 10px 40px;">
            </div>
            <div class="delete-div">
                <input type="submit" name="dont_delete" value="DON'T DELETE ACCOUNT" class="delete-btn">
            </div>
            
        </form>
    </div>

<?php
$username=$_SESSION["username"];
if(isset($_POST["delete_account"])){
    $delete_query="delete from tbl_user where username='$username'";
    $execute_query=mysqli_query($conn,$delete_query);
    if($execute_query){
        session_destroy();
        echo "<script>alert('Account is deleted successfully!!')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST["dont_delete"])){
    echo"<script>window.open('profile.php','_self')</script>";
}

?>
