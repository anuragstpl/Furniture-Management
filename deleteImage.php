<?php
include'dbconnection.php';
if(isset($_POST['imageid'])){
	$id = $_POST['imageid'];
	$photoname = $_POST['imagename'];
	$update = mysqli_query($con,"update products set image ='' where id='$id'");

	if($update === true){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($photoname);
		if (!unlink($target_file))
		{
			echo ("Error deleting $photoname");
		}
		else
		{
			echo ("Deleted $photoname");
			
		}
	}

}

?>