<?php
include("./component/connect.php");
include("./component/functions.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen Hub</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <!-- Navbar section starts here -->
    <?php
        include("./component/navbar.php");
    ?>
    <!-- Navbar section ends here -->

    <!-- cart function  -->

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
        <!-- <div class="clearfix"></div> -->
    </section>
    <!-- guest section ends here -->

    <!-- food search section starts here -->
    <section class="food-search text-center">
        <div class="container">
            <form action="food-search.php" method="post">
                <input type="search" name="search_food" placeholder="Search for Food.." required>
                <input type="submit" name="search_data" value="Search" class="search-btn">
            </form>
        </div>
        <div class="clearfix"></div>
    </section>
    <!-- food search section ends here -->

    <!-- categories section starts here -->
    <section class="categories">
        <h2>Explore Foods</h2>
        <div class="gallery">
            <?php
                // using function  
                getcategories();
            ?>
        </div>
    </section>
    <!-- categories section ends here -->

    <!-- food menu section starts here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <!-- fetching data from database -->
            <?php 
                // using function 
                getfoods();
            ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- food menu section ends here -->

    <!-- social section starts here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social section ends here -->

    <!-- footer section starts here -->
    <?php
        include("./component/footer.html");
    ?>
    <!-- footer section ends here -->

    <!-- javascript section  -->


</body>
</html>