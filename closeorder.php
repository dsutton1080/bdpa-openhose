<?php
include ('conn.php');
// session_start();
$order_id = $_SESSION['order_id'];
echo $order_id; 
$query = "update orders set in_cart = 'n' where order_id = '$order_id' ";
mysqli_query($con, $query);
// include ('logout.php');
// header('Location: http://localhost/new1/index.php');
