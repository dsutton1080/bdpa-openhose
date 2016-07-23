<?php
include 'header.html';
?> 

<p> Congradulations, your order is complete, heres a list of all your items:  <p>  

<?php 


$qty=$_GET ['qty'];
$product_id=$_GET ['product'];
$customer_id = $_SESSION['customer_id'];


$query= "select o.order_id, o.date, o.customer_id, oi.product_id, oi.qty, p.product_name, p.price ";
$query= $query . "from orders o, order_item oi, product p ";
$query= $query . "where o.customer_id = $customer_id ";
$query= $query . "and o.order_id = oi.order_id ";
$query= $query . "and oi.product_id = p.product_id ";
$QUERY= $query . "and o.in_cart = 'y'";
$query= $query . "and o.order_id = " . $_SESSION['order_id'] . "; ";

echo "<table class='table'> <th> Order for $firstname $lastname</th>";

while ($row = mysqli_fetch_array($result)){
	$product_name= $row['product_name'];
	$qty = $row['qty'];
	$price = $row['price'];
	echo "<tr> <td> $product_name </td> <td> $qty </td> <td> $price </td> </tr>";
}

echo "</table>";


include 'footer.html';
?>