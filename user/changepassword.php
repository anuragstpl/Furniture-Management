<?php
include'dbconnection.php';
$id = $_SESSION['id'];

if(isset($_POST['Submit'])){
	if ($_POST["newpassword"] === $_POST["confirmpassword"]) {
   // success!
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$confirmpassword = $_POST['confirmpassword'];

		$checkPassword = mysqli_query($con,"SELECT password FROM users WHERE id ='$id'");
		$res = mysqli_fetch_array($checkPassword);

		if ($oldpassword === $res["password"]) {
			$update = mysqli_query($con,"update users set password ='$newpassword' where id='$id'");
			$return['msg'] = "Password Update Successfully !!";
		}else{
			$return['msg'] = "Your entered incorrect old password !";
		}
		
	}
	else {
   // failed :(
		$return['msg'] = "Your password and confirmation password do not match.!";
	}
}




?>


