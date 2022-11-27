<?php
include'dbconnection.php';
$id = $_SESSION['id'];

$sql = mysqli_query($con,"SELECT * FROM products where feature = '1'");
$rowcount=mysqli_num_rows($sql);

if($rowcount != 0 ){
	while($row = mysqli_fetch_assoc($sql)){
		$feature[] = $row;	
	}
}else{
	$feature = '';	
}
	
if(!empty($feature)){
	$feature;
}else{
	$feature;
}
return $feature;
echo '<pre>';
print_r($feature);
die('aasas');
?>


