<?php 
session_start();
include 'header.php';
?>

<table style="margin: 0px auto;" class="table">
	<tr>
	<th>Product Name</th>
	<th>Size</th>
	<th>Price</th>
	<th>Qty</th>
	<th>Add</th>
	</tr>
		
	
	
	
<?php
include 'conn.php';
$query = "SELECT p.product_id, p.product_name, p.size, p.price FROM product p, product_type pt where p.product_type_id = pt.product_type_id";
$result = mysqli_query($con, $query);
	
while ($row = mysqli_fetch_array($result)){
	$product_name = $row['product_name'];
	$size = $row['size'];
	$price = $row['price'];
	$product_id = $row['product_id'];
	
	echo "<form class=\"button\" method=\"post\" action=\"addToCart.php\">";
	echo "<tr>";
	echo "<td>$product_name</td>";
	echo "<td>$size</td>";
	echo "<td>$price</td>";	
	echo "<td><input type=\"text\" name=\"qty\"></td>";
	echo "<input type=\"hidden\" name=\"product_id\" value=\"$product_id\">";
	echo "<td><button class=\"button2\" type=\"submit\">Add</button></td>";
	echo "</tr>";
	echo "</form>";
}
	
include 'footer.php';
	?>
	

