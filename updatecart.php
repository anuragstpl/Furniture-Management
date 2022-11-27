<?php
include'dbconnection.php';


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = mysqli_query($con,"SELECT * FROM products where id = '$id'");
	$rowcount = mysqli_num_rows($sql);

	if($rowcount != 0 ){
		while($row = mysqli_fetch_assoc($sql)){
			$orders[] = $row;	
		}
	}else{
		$orders = '';	
	}
	
	return $orders;
	

}


?>