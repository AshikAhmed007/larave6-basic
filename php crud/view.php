<?php 

session_start();

require_once './std_controller.php';
$std=new Student();
$result=$std->show_info();

// echo session_id();

// echo $_SESSION['name'];
// unset ($_SESSION['name']);
// echo $_SESSION['name'];
$msg='';
if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$msg=$std->delete_info($id);
}


if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}

$result=$std->show_info();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>View Student Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

<center>
	<h3 style="color:green;"><?php echo  $msg; ?></h3>
	<table style="margin-top: 100px;" class="table table-dark table-hover table-striped">
	<tr>
		<td>SL no.</td>
		<td>Student Name</td>
		<td>Phone</td>
		<td>Email</td>
		<td>Address</td>
		<td>Action</td>

	</tr>
		<?php $i=1; while($std_info=mysqli_fetch_assoc($result)){ ?>
			
	<tr>
		<td><?php echo $i++; ?></td>
		<td> <?php echo  $std_info['std_name'];?></td>
		<td><?php  echo $std_info['phone_number'];?></td>
		<td><?php echo $std_info['email']; ?></td>
		<td><?php  echo $std_info['Address'];?></td>
		<td>
			<a href="edit.php?id=<?php echo  $std_info['std_id']; ?>" style="color: white;" ><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
			<a href="?delete=<?php echo  $std_info['std_id']; ?>" style="color: white"; onclick="return confirm('Are you sure to delete this?');"><i class="fa fa-trash"></i></a>
		</td>

	</tr>
<?php } ?>
	</table></center>
</body>
</html>