<?php 


class Student{
	protected $con;

	public function __construct(){
	$hostname="localhost";
	$username="root";
	$pass="";
	$dbname="std_info";
	$this->con=mysqli_connect($hostname,$username,$pass,$dbname);
	if(!$this->con){
		die('Connection Failed'.mysqli_error($this->con));

	}
}

public function save_info($data){
$sql="INSERT INTO `stud_details` ( `std_name`, `phone_number`, `email`, `Address`) VALUES ( '$data[std_name]', '$data[phone_number]', '$data[email]', '$data[Address]')";

if(mysqli_query($this->con, $sql)){
	$msg="Saved sucessfuly!!!";
	return $msg;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}


public function show_info(){

	$sql="SELECT * FROM stud_details ORDER BY std_id DESC ";
	if(mysqli_query($this->con, $sql)){
	$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}


public function edit_info_by_id($std_id){
$sql="SELECT * FROM stud_details WHERE 	std_id='$std_id' ";
if(mysqli_query($this->con, $sql)){
	$result=mysqli_query($this->con, $sql);
	return $result;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}
}

public function update_info($data){
$sql="UPDATE stud_details SET std_name='$data[std_name]',phone_number='$data[phone_number]',email='$data[email]',Address='$data[Address]' WHERE std_id='$data[std_id]'";

if(mysqli_query($this->con, $sql)){
	session_start();
	$_SESSION['msg']='Update sucessfuly!!!';
	header('Location: view.php'); }
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}

}


public function delete_info($id){
	$sql="DELETE FROM stud_details where std_id='$id'";

if(mysqli_query($this->con, $sql)){
	$msg="Deleted sucessfuly!!!";
	return $msg;
}
else{
	die('Query Problem!!!'.mysqli_error($this->con));
	}

}

public function save_img($data){
$img_name=$_FILES['pic']['name'];
$ext = pathinfo($_FILES['pic']['name']);
$ext = strtolower($ext['extension']);
$img_size=$_FILES['pic']['size'];
$sql="insert into tbl_img (img) VALUES ('$ext')"; 	
mysqli_query($this->con, $sql);
$img_url='blog_img/pic-'.mysqli_insert_id($this->con).".".$ext;



	
		if($img_size>5000000){
			die('Image is too large');
		}
		else{
			move_uploaded_file($_FILES['pic']['tmp_name'], $img_url);
		}
	}





}

 ?>