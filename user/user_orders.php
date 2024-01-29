
<link rel="stylesheet" href="../css/style.css">
<style>
    .status{
        background: #000;
        color: #fff;
        padding: 4px;
        border-radius: 5px;
    }
    .status:hover{
        background: green;
        color: #000;
    }
</style>

<h3>All my orders</h3>

<div class="view-orders">
    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Order id</th>
                <th>Food id</th>
                <th>Food quantity</th>
                <th>Total Amount</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $username=$_SESSION["username"];
                $select_query="select * from tbl_user where username='$username'";
                $result=mysqli_query($conn,$select_query);
                $row_data=mysqli_fetch_array($result);
                $user_id=$row_data['user_id'];

                $select_orders="select * from tbl_orders where user_id=$user_id";
                $execute_query=mysqli_query($conn,$select_orders);
                $number=0;
                while($row_order=mysqli_fetch_assoc($execute_query)){
                    $order_id=$row_order["order_id"];
                    $food_id=$row_order["food_id"];
                    $food_quantity=$row_order["food_quantity"];
                    $total_amount=$row_order["total_amount"];
                    $date=$row_order["date"];
                    $order_status=$row_order["order_status"];
                    if($order_status=='pending'){
                        $order_status= 'Incomplete';
                    }else{
                        $order_status= 'Complete';
                    }
                    $number++;
                    echo "<tr>
                    <td>$number</td>
                    <td>$order_id</td>
                    <td>$food_id</td>
                    <td>$food_quantity</td>
                    <td>$total_amount</td>
                    <td>$date</td>
                    <td>$order_status</td>";
                ?>
                <?php 
                    if($order_status== 'Complete'){
                        echo "<td>Paid<td>";
                    }else{
                        echo "<td><a href='payment.php?order_id=$order_id' class='status'>Confirm</a></td></tr>";
                    }
                }
                ?>
            
        </tbody>
    </table>
</div>