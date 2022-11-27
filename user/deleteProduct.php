<?php
$sql = mysqli_query($con,"DELETE FROM products where id = '$pid'");
header('Location:'. BASE_URL.'/dashboard');
?>

