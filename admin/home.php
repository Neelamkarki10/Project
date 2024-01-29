<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- navbar section starts here  -->
    <section class="navbar">
        <div class="logo">
            <a href="home.php">Canteen Hub</a>
        </div>
        <div class="home">
            <a href="../index.php">Home</a>
        </div>
        <div class="nav-container">
            <ul>
                <li><a href="">Welcome Admin!</a></li>
            </ul>
        </div>
    </section>
    <!-- navbar section ends here  -->
    <section class="second">
        <h3>Admin Roles</h3>
    </section>

    <section class="third">
            <ul class="Roles">
                <li><a href="home.php?insert_foods" class="button">Insert Foods</a></li>
                <li><a href="home.php?view_foods" class="button">View Foods</a></li>
                <li><a href="home.php?insert_category" class="button">Insert Categories</a></li>
                <li><a href="home.php?view_categories" class="button">View Categories</a></li>
                <li><a href="" class="button">View Orders</a></li>
                <li><a href="" class="button">View Payments</a></li>
                <li><a href="" class="button">View Users</a></li>
                <li><a href="" class="button">Logout</a></li>
            </ul>
    </section>

    <!-- fourth section  -->
    <div class="container">
        <?php
            if(isset($_GET["insert_foods"])) {
                include("insert_foods.php");
            }
            if(isset($_GET["view_foods"])) {
                include("view_foods.php");
            }
            if(isset($_GET["delete_food"])) {
                include("delete_food.php");
            }
            if(isset($_GET["edit_food"])) {
                include("edit_food.php");
            }
            if(isset($_GET["insert_category"])) {
                include("insert_categories.php");
            }
            if(isset($_GET["view_categories"])) {
                include("view_categories.php");
            }
            if(isset($_GET["delete_cat"])) {
                include("delete_category.php");
            }
        ?>
    </div>

    <!-- footer section starts here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By Vijay Thapa Neelam Karki</p>
        </div>
    </section>
    <!-- footer section ends here -->
</body>
</html>