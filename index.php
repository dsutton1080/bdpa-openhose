<?php
session_start();
include ('header.html'); 
?>
<div class="row; container">


<div class="col-md-8" style="background-color:white;">
<h1>ION Seeds Order Form</h1>

<form action='loginhandler.php' method='get'>
<div class="form-group">
<label for="exampleInputEmail1">UserName</label>
<input type="text" class="form-control" placeholder="Username" name="username">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" placeholder="Password" name="password">
</div>
<div class="form-group">
<!-- <label for="exampleInputPassword1">Grower Account ID</label>
<input type="text" class="form-control" placeholder="Grower Account ID" name="growerA">
</div>-->
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 
 
 
 </div>
<?php 
include ('footer.html'); 
?>