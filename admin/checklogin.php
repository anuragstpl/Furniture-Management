<?php
function check_login()
{
/*	echo '<pre>';
	print_r($_SESSION);
	die('asa');*/
	if(strlen($_SESSION['login'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION["login"]="";
		header("Location: http://$host$uri/$extra");
	}
	/*else{
		header("Location: http://$host$uri/$extra");
	}*/
}
?>