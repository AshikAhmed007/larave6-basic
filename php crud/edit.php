<?php 
session_start();
$std_id=$_GET['id'];
require_once './std_controller.php';
$std=new Student();
$result=$std->edit_info_by_id($std_id);
$std_info=mysqli_fetch_assoc($result);


if(isset($_POST['btn'])){
$std->update_info($_POST);

	}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>ADD STUDENTS</title>
</head>
<body>

<a href="View.php">View Student </a>|| 
<a href="std_info.php">Add Student</a> <br><br>
<form action="" method="post">
	<table>
		<tr>
			<td>Student Name</td>
			<td><input type="text" name="std_name" value="<?php echo  $std_info['std_name']; ?>" required="">
			<input type="hidden" name="std_id" value="<?php echo  $std_info['std_id']; ?>" required="">
			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="tel" name="phone_number" value="<?php  echo $std_info['phone_number'];?>" required=""></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="<?php echo $std_info['email']; ?>" required=""></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><textarea rows="3" cols="40" name="Address" ><?php echo $std_info['Address']; ?></textarea></td>

		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btn" value="update info"></td>
		</tr>

	</table>
</form>

</body>
</html>