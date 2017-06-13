<?php
include 'conn.php';
session_start();

$user = $_SESSION['user'];
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];

$query = "select customer_order_id from customer_order where customer_id = '$user' and incart= 'y'";
$result = mysqli_query($con, $query);


while($row = mysqli_fetch_array($result)){
	$order_id = $row['customer_order_id'];
	
}

if(!isset($order_id)){
	$sql = "insert into customer_order (customer_id, order_date, incart) values ('$user', now(), 'y');";
	$result = mysqli_query($con, $sql);
	$order_id = mysqli_insert_id($con);
	
}
echo $order_id;
$query = "select count(*)+1 as item_id from customer_order_item where customer_order_id = '$order_id'";
while($row = mysqli_fetch_array($result)){
	$item_id = $row['item_id'];
	$sql = "insert into customer_order_id (customer_order_id, customer_order_item_id, product_id, qty) values ($order_id, $item_id, $product_id, $qty)";
	$result = mysqli_query($con, $sql);
}

?>