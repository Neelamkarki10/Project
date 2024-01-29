<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
    <section class="navbar">
        <div class="logo">
            <a href="index.php">Canteen Hub</a>
        </div>
        <nav class="nav-container">
            <ul class="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="foods.php">Foods</a></li>
                <li><a href="#">About</a></li>
                <?php
                    if(isset($_SESSION["username"])){
                        echo "<li><a href='./user/profile.php'>Recommendation</a></li>
                        <li><a href='./user/profile.php'>Profile</a></li>";
                    }else{
                        echo "<li><a href='admin/home.php'>Admin</a></li>";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</body>
</html>