<?php 
session_start();
$msg='';
if(isset($_POST['btn'])){
require_once './std_controller.php';
$std=new Student();
$msg=$std->save_info($_POST);
}
// echo session_id();
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>ADD STUDENTS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="View.php">View Student </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="std_info.php">Add Student</a>
			</li>
		</ul>
	</nav>
	<h1 style="color: green"><?php echo $msg; ?></h1>

<div class="container col-lg-3">
<form  style="margin-top: 100px;" action="" method="post">

	<div class="form-group">
      <label for="name">Student Name :</label>
      <input type="text" class="form-control" placeholder="Enter name" name="std_name">
    </div>

	<div class="form-group">
      <label for="Phone">Phone Number :</label>
      <input type="tel" class="form-control" placeholder="Enter number" name="phone_number">
    </div>

    <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="address">Address :</label>
      <textarea class="form-control" rows="5" placeholder="Enter address" name="Address"></textarea>
    </div>

	<button type="submit" class="btn btn-success" name="btn">submit</button>

</form>
</div>
</body>
</html>