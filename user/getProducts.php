<?php
include'dbconnection.php';
$id = $_SESSION['id'];

$sql = mysqli_query($con,"SELECT * FROM products where user_id = '$id'");
$rowcount=mysqli_num_rows($sql);

if($rowcount != 0 ){
	while($row = mysqli_fetch_assoc($sql)){
		$results[] = $row;	
	}
}else{
	$results = '';	
}
	
if(!empty($results)){
	$results;
}else{
	$results;
}
return $results;

?>


