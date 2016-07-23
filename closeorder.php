<?php
include ('conn.php');
session_start();
$customer_id = $_SESSION['customer_id'];
$query = "update orders set in_cart = 'n' where customer_id = '$customer_id' ";
mysqli_query($con, $query);
include ('logout.php');
header('Location: http://localhost/new1/index.php');