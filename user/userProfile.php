<?php
include'dbconnection.php';
$id = $_SESSION['id'];

	
if(isset($_POST['Submit'])){
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$contactno = $_POST['contactno'];
	$update = mysqli_query($con,"update users set fname='$fname',lname='$lname',email='$email',contactno='$contactno' where id='$id'");
	$return['msg']= "Profile Update Successfully !!";

}

$sql = mysqli_query($con,"SELECT * FROM users where id = '$id'");
	$result = mysqli_fetch_assoc($sql);
	return $result;




?>


