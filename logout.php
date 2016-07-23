<?php

include ('conn.php');
// session_start();
$order_id = $_SESSION['order_id'];
$query = "delete from orders where order_id = '$order_id' ";
mysqli_query($con, $query);
session_destroy(); 
header('Location: http://localhost/new1/index.php');
?>