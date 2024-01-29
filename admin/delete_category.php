

<?php
include("../component/connect.php");
if(isset($_GET['delete_cat'])){
    $delete_category=$_GET['delete_cat'];
    // echo $delete_category;
    $delete_query="delete from categories where category_id=$delete_category";
    $result_delete=mysqli_query($conn,$delete_query);
    if($result_delete){
        echo "<script>alert('Category is deleted successfully!')</script>";
        echo "<script>window.open('./home.php?view_categories','_self')</script>";
    }
}

?>
<html></html>