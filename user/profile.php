<?php
include("../component/connect.php");
// include("../component/functions.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar section starts here -->
    <section class="navbar">
        <div class="logo">
            <a href="../index.php">Canteen Hub</a>
        </div>
        <nav class="nav-container">
            <ul class="links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../categories.php">Categories</a></li>
                <li><a href="../foods.php">Foods</a></li>
                <li><a href="#">About</a></li>
                <?php
                    if(isset($_SESSION["username"])){
                        echo "<li><a href=''>Recommendation</a></li>
                        <li><a href='profile.php'>Profile</a></li>";
                    }
                ?>
            </ul>
        </nav>
        <div class="cart">
            <a href=""><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </div>
        <div class="toggle-btn">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <script>
        toggleBtn = document.querySelector(".toggle-btn");
        toggleBtn.onclick = function(){
            navBar = document.querySelector(".nav-container");
            navBar.classList.toggle("active");
        }
    </script>
    <!-- Navbar section ends here -->

    <!-- guest section starts here -->
    <section class="notification">
        <ul >
            <?php
                if(!isset($_SESSION["username"])){
                    echo "<li><a href='profile.php'>Welcome Guest!</a></li>";
                }else{
                    echo "<li><a href=''>Welcome ".$_SESSION["username"]."!</a></li>";
                }
            ?>
            <?php
                if(!isset($_SESSION["username"])){
                    echo "<li><a href='user_login.php'>Login</a></li>";
                }else{
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
            ?>
        </ul>
        <!-- <div class="clearfix"></div> -->
    </section>


    <div class="profile">
        <h3>My profile</h3>
        <div class="roles">
            <ul class="list">
                <li><a href="profile.php?my_orders" class="link-btn">My Orders</a></li>
                <li><a href="profile.php?edit_account" class="link-btn">Edit Account</a></li>
                <li><a href="profile.php?history" class="link-btn">History</a></li>
                <li><a href="profile.php?delete_account" class="link-btn">Delete Account</a></li>
                <li><a href="logout.php" class="link-btn">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="info">
        <?php
            if(isset($_GET["edit_account"])){
                include("edit_account.php");
            }
            if(isset($_GET["my_orders"])){
                include("user_orders.php");
            }
            if(isset($_GET["delete_account"])){
                include("delete_account.php");
            }
        ?>
    </div>

    <!-- footer section starts here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By Neelam Karki Bipul Karki Bhawesh Mishra </p>
        </div>
    </section>
    <!-- footer section ends here -->
</body>
</html>