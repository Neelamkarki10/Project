<?php
include("../component/connect.php");
session_start();

if (isset($_GET["order_id"])) {
    $order_id=$_GET['order_id'];

    $select_orders="select * from tbl_orders where order_id=$order_id";
    $result=mysqli_query($conn,$select_orders);
    $row_data=mysqli_fetch_array($result);
    $food_id=$row_data['food_id'];
    $food_quantity=$row_data['food_quantity'];
    $total_amount=$row_data['total_amount'];
}

if(isset($_POST['confirm_btn'])){
    $food_id=$_POST['food_id'];
    $food_quantity=$_POST['food_qty'];
    $total_amount=$_POST['total_amt'];
    $payment_mode=$_POST['payment_mode'];
    
    $insert_query="insert into tbl_payment (order_id,food_id,food_quantity,total_amount,payment_mode,date) values($order_id,$food_id,$food_quantity,$total_amount,'$payment_mode',Now())";
    $execute_query=mysqli_query($conn,$insert_query);
    if($execute_query){
        echo "<script>alert('Payment is completed successfully!!')</script>";
        echo"<script>window.open('profile.php','_self')</script>";
    }

    // updating order table 
    $update_query= "update tbl_orders set order_status='Complete' where order_id=$order_id";
    $result_update=mysqli_query($conn,$update_query);

}

?>
<title>Payment</title>
<link rel="stylesheet" href="../css/style.css">
<style>
    h3{
        font-size: 18px;
        font-weight: bold;
    }
</style>

<section class="payment">
        <form action="" method="post" class="payment-form">
            <h1>Confirm Payment</h1>
            <div class="input-field">
                <h3>Food ID</h3>
                <input type="text" name="food_id" value="<?php echo $food_id ?>" autocomplete="off" required>
            </div>
            <!-- Food_id  -->
            <div class="input-field">
                <h3>Food Quantity</h3>
                <input type="text" name="food_qty" value="<?php echo $food_quantity?>" autocomplete="off" required>
            </div>
            <!-- Food_id  -->
            <div class="input-field">
                <h3>Total Amount</h3>
                <input type="text" name="total_amt" value="<?php echo $total_amount?>" autocomplete="off" required>
            </div>
            <!-- payment method -->
            <div class="input-field">
                <h3>Payment Method</h3>
                <select name="payment_mode">
                    <option>Select Payment Mode</option>
                    <option>Cash on delivery</option>
                    <option>Online banking</option>
                    <option>Esewa</option>
                </select>
            </div>
            
            <div class="input-field">
                <input type="submit" name="confirm_btn" class="confirm_btn" value="Confirm"/>
            </div>

        </form>
    </section>