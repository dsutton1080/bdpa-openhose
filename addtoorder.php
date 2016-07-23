<?php
include ('conn.php');
include ('header.html');
?>
<div class="row; container">




<div class="col-md-8" style="background-color:white;">
<?php 
$qty=$_GET ['qty'];
$product_id=$_GET ['product'];
$customer_id = $_SESSION['customer_id'];
$query = "select order_id from orders where in_cart = 'y' and customer_id = $customer_id;";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
	$order_id = $row['order_id'];
	$_SESSION['order_id'] = $order_id; 
	// echo "no order found for $customer_id";
}

if (!isset($order_id)){ 
	// If there is not an order 
	$query = "insert into orders (date, customer_id, in_cart) values (now(), $customer_id, 'y');"; 
	mysqli_query($con, $query);
	$order_id = mysqli_insert_id($con);
	$_SESSION['order_id'] = $order_id;
}

$query = "insert into order_item (order_id, customer_id, product_id, qty) values ($order_id, $customer_id, $product_id, $qty ); ";
mysqli_query($con, $query);

$query = "select first_name, last_name from customer where customer_id = '$customer_id' ";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
	$firstname = $row['first_name'];
	$lastname = $row['last_name'];
}

$query= "select o.order_id, o.date, o.customer_id, oi.product_id, oi.qty, p.product_name, p.price ";
$query= $query . "from orders o, order_item oi, product p ";
$query= $query . "where o.customer_id = $customer_id ";
$query= $query . "and o.order_id = oi.order_id ";
$query= $query . "and oi.product_id = p.product_id ";
$QUERY= $query . "and o.in_cart = 'y'";
$query= $query . "and o.order_id = " . $_SESSION['order_id'] . "; "; 
// $query= $query .    = $query + previous value 
$result = mysqli_query($con, $query);


echo "<table class='table'> <th> Order for $firstname $lastname</th>";

while ($row = mysqli_fetch_array($result)){
	$product_name= $row['product_name'];
	$qty = $row['qty']; 
	$price = $row['price'];
	echo "<tr> <td> $product_name </td> <td> $qty </td> <td> $price </td> </tr>";
	
}

echo "</table>";



?>

<form action="closeorder.php">
<input type="submit" value="Submit">
</form>
<form action="logout.php">
<input type="submit" value="Cancel Order">
</form>
</div>
<?php 
include ('footer.html'); 
?>