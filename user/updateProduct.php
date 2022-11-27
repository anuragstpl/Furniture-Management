<?php
include'dbconnection.php';
if(isset($_GET['id'])){
	$pid = $_GET['id'];
}



if(isset($_POST['Submit'])){
	$id = $_POST['id'];
	$pname = $_POST['pname'];
	$product_price = $_POST['product_price'];
	$product_details = $_POST['product_details'];

	if(!empty($_POST['image'])){
		$path = $_POST['image'];
	}else{
		$path = '';
	}
	
/*
	if($_POST['feature']==='on'){
		$feature = 1;
	}else{
		$feature = 0;
	}*/


	/*f925916e2754e5e03f75dd58a5733251*/
	if(!empty($_FILES['image']['name'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$path = $_FILES["image"]["name"];
		
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			"The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			/*File Saved In Folder*/
			$update = mysqli_query($con,"update products set name ='$pname',price ='$product_price',details ='$product_details',image ='$path' where id='$id'");
			$return['msg']= "Product Update Successfully !!";

		} else {
			$return['msg'] = "Sorry, there was an error uploading your file.";

		}

	}else{
		$update = mysqli_query($con,"update products set name ='$pname',price ='$product_price',details ='$product_details',image ='$path' where id='$id'");
		$return['msg']= "Product Update Successfully !!";

	}
	
}

$sql = mysqli_query($con,"SELECT * FROM products where id = '$pid'");
$result = mysqli_fetch_assoc($sql);

return $result;
?>


