<?php
	
$sql = mysqli_query($con,"SELECT * FROM products where feature = '1'");
$rowcount = mysqli_num_rows($sql);

if($rowcount != 0 ){
	while($row = mysqli_fetch_assoc($sql)){
		$features[] = $row;	
	}
}else{
	$features = '';	
}
	
if(!empty($features)){
	$features;
}else{
	$features;
}

return $features;
?>


