<?php
include("../component/connect.php");
?>

<!-- link  -->
<link rel="stylesheet" href="css/style.css">

<div class="food-container">
    <h4>All Foods</h4>
    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Food Title</th>
                <!-- <th>Food Description</th> -->
                <th>Food Image</th>
                <th>Food Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody>  
                <?php
                $select_food="select * from foods";
                $result_select=mysqli_query($conn,$select_food);
                $number=0;
                while($row=mysqli_fetch_assoc($result_select)){
                    $food_id=$row["food_id"];
                    $food_title=$row["food_title"];
                    $food_description=$row["food_description"];
                    $food_image=$row["food_image"];
                    $food_price=$row["food_price"];
                    $number++;

                ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $food_title ?></td>
                    <!-- <td><p>this is momo</p></td> -->
                    <td>
                        <img src='./product_images/<?php echo $food_image?>' alt='<?php echo $food_title?>' class='cat_image'/>
                    </td>
                    <td>Rs.<?php echo $food_price ?></td>
                    <td>0</td>
                    <td>true</td>
                    <td>
                        <a href='home.php?edit_food=<?php echo $food_id?>'>
                            <input type='submit' name='edit_food' value='Edit'/></a>
                    </td>
                    <td>
                        <a href='home.php?delete_food=<?php echo $food_id?>'>
                            <input type='submit' name='delete_food' value='Delete'/></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </thead>
    </table>
</div>
