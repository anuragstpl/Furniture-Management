<?php
include'dbconnection.php';

if(isset($_POST['Submit'])){	
	$id = $_POST['id'];
	$name = $_POST['pname'];
	$price = $_POST['product_price'];
	$product_details = $_POST['product_details'];
	

	/*if($_POST['feature']==='on'){
		$feature = 1;
	}else{
		$feature = 0;
	}
	*/

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$path = $_FILES["image"]["name"];
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
		$return['msg']= "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		$return['msg'] = "File is not an image.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		$return['msg'] =  "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		$return['msg']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$return['msg'] = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		"The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		$insert = mysqli_query($con,"insert into products(user_id,name,price,details,image) values('$id','$name','$price','$product_details','$path')");

		$return['msg']= "Product Saved Successfully !!";
	} else {
		$return['msg'] = "Sorry, there was an error uploading your file.";
	}
}


}
?>


