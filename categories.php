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

    <!-- guest section starts here -->
    <section class="notification">
        <ul>
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
        <div class="clearfix"></div>
    </section>
    <!-- guest section ends here -->

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

    <!-- footer section starts here -->
    <?php
        include("./component/footer.html");
    ?>
    <!-- footer section ends here -->

    <!-- javascript section  -->

</body>