<?php
include ('header.html'); 
include ('conn.php'); 
?>

<div class="row; container">
<div class="col-md-8" style="background-color:white;">

<?php

$query="select product_id, product_name, product_desc, price, species from product where species='corn';"; 
$result=mysqli_query($con, $query); 
?>

           <h2>Corn Products</h2>
           <table>
                          <tr>
                   <th>Product</th>
                   <th>$/bag</th>
                   <th>Number of Bags</th>
               </tr>
           <?php 
           while ($row=mysqli_fetch_array($result)) {
               $prodName = $row['product_name'];
               $product_id = $row['product_id'];
               $price = $row['price'];
               // gets the reults/data from the array and asigns them to new variables on the current page 
    echo "<form action='addtoorder.php' method='GET'>";
               echo "<tr>";
    echo "<td>" . $prodName . "</td><td>$" . $price . "</td><td><input type='text' name ='qty'>";
    echo "<input type='hidden' name='product' value='$product_id'>";
    echo "<td> <input type='submit' value='Add to Order'></td>" ;
    echo "</tr>";
    echo "</form>";
}
?>
           </table>
           <br>
           <h2>Soybean Products</h2>
           <table>
               <tr>
                   <th>Product</th>
                   <th>$/bag</th>
                   <th>Number of Bags</th>
               </tr>
<?php 
// foreach ($soyProducts as $p){
$query="select product_id, product_name, product_desc, price, species from product where species='soy';"; 
$result=mysqli_query($con, $query); 
while ($row=mysqli_fetch_array($result)) {
    $prodName = $row['product_name'];
    $product_id = $row['product_id'];
    $price = $row['price'];
    echo "<form action='addtoorder.php' method='GET'>";
    echo "<tr>";
    echo "<td>" . $prodName . "</td><td>$" . $price . "</td><td><input type='text' name='product'>";
    echo "<input type='hidden' name='product' value='$product_id'>";
    echo "<td><input type='submit' value='Add to Order'></td>";
    echo "</tr>";
    echo "</form>";
}
    ?>
    </table>
        </div> 
 
 
 
 </div>
<?php 
include ('footer.html'); 
?>
