<?php
include("../component/connect.php");
?>

<!-- link  -->
<link rel="stylesheet" href="css/style.css">

<div class="view-container">
    <h4>All Categories</h4>
    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Category title</th>
                <th>Category image</th>
                <!-- <th>Edit</th> -->
                <th>Delete</th>
            </tr>
            <tbody>
                <?php
                    $select_category="select * from categories";
                    $result_select=mysqli_query($conn,$select_category);
                    $number=0;
                    while($row=mysqli_fetch_assoc($result_select)){
                        $category_id=$row["category_id"];
                        $category_title=$row['category_title'];
                        $category_image=$row['category_image'];
                        $number++;
                ?>        
                        <tr>
                            <td><?php echo $number?></td>
                            <td><?php echo $category_title?></td>
                            <td><img src='./category_images/<?php echo $category_image?>' alt='<?php echo $category_title?>' class='cat_image'/></td>
                            <td>
                                <a href='home.php?delete_cat=<?php echo $category_id?>'>
                                    <input type='submit' name='delete_cat' value='Delete'/></a>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </thead>
    </table>
</div>
