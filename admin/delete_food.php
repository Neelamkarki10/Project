
<?php
include("../component/connect.php");
if(isset($_GET['delete_food'])){
    $delete_food=$_GET['delete_food'];
    // echo $delete_food;
    $delete_query="delete from foods where food_id=$delete_food";
    $result_delete=mysqli_query($conn,$delete_query);
    if($result_delete){
        echo "<script>alert('Food is deleted successfully!')</script>";
        echo "<script>window.open('./home.php?view_foods','_self')</script>";
    }
}

?>
<html></html>