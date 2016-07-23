<?php
include ('conn.php'); 
session_start();
$user=$_GET ['username'];
$pass=$_GET ['password'];
$query="select customer_id, first_name, last_name, username, password from customer where username='$user' and password='$pass';"; 
$result=mysqli_query($con, $query); 



while ($row=mysqli_fetch_array($result)) {
	
// SET THE CUSTOMER IF THERE ARE ROWS RETURNED FROM THE DATABASE
// NOTE:  ROWS WILL ONLY BE RETURNED FROM THE DATABASE 
// WHICH MEANS CUSTOMER ID WILL ONLY BE SET IF THE USER ENTERED A VALID USER / PASSWORD COMBINATIO
$customer_id=$row['customer_id']; 
$_SESSION['customer_id']=$customer_id; 
}


if (isset($customer_id)) {
// SEND THE USER TO FORM2 ONLY IF THE CUSTOMER ID VARIABLE IS SET
header ('Location: http://localhost/new1/form2.php');
}
else {
// SEND THE USER TO INDEX IF THE CUSTOMER ID IS NOT SET
// THIS MEANS THEY DID NOT PASS VALIDATION
header('Location: http://localhost/new1/index.php'); 
}
?>