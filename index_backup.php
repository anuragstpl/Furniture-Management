<?php session_start();
require_once('dbconnection.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contact=$_POST['contact'];
	$enc_password=md5($password);
	$a=date('Y-m-d');
	$msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno,posting_date) values('$fname','$lname','$email','$enc_password','$contact','$a')");
	if($msg)
	{
		echo "<script>alert('Register successfully');</script>";
	}
}

// Code for login system
if(isset($_POST['login']))
{
	$password=$_POST['password'];
	$dec_password=md5($password);
	$useremail=$_POST['uemail'];
	$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
		$extra="welcome.php";
		$_SESSION['login']=$_POST['uemail'];
		$_SESSION['id']=$num['id'];
		$_SESSION['name']=$num['fname'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
	else
	{
		echo "<script>alert('Invalid username or password');</script>";
		$extra="index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
		exit();
	}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
	$row1=mysqli_query($con,"select email,password from users where email='".$_POST['femail']."'");
	$row2=mysql_fetch_array($row1);
	if($row2>0)
	{
		$email = $row2['email'];
		$subject = "Information about your password";
		$password=$row2['password'];
		$message = "Your password is ".$password;
		mail($email, $subject, $message, "From: $email");
		echo  "<script>alert('Your Password has been sent Successfully');</script>";
	}
	else
	{
		echo "<script>alert('Email not register with us');</script>";	
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login System</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>

	<!-- Theme CSS  -->

	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/fonts/themify/themify-icons.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	
	<link rel="stylesheet" type="text/css" href="fonts/fonts/elegant-font/html-css/style.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/front/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/front/css/main.css">
	<!-- END Here -->


	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default',       
			width: 'auto', 
			fit: true 
		});
	});
</script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,600,700,200italic,300italic,400italic,600italic|Lora:400,700,400italic,700italic|Raleway:400,500,300,600,700,200,100' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main">
		<h1>Registration and Login System</h1>
		<div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span>

					</li>
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>
					<li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Forgot Password</span></li>
					<div class="clear"></div>
				</ul>		

				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="facts">

							<div class="register">
								<form name="registration" method="post" action="" enctype="multipart/form-data">
									<p>First Name </p>
									<input type="text" class="text" value=""  name="fname" required >
									<p>Last Name </p>
									<input type="text" class="text" value="" name="lname"  required >
									<p>Email Address </p>
									<input type="text" class="text" value="" name="email"  >
									<p>Password </p>
									<input type="password" value="" name="password" required>
									<p>Contact No. </p>
									<input type="text" value="" name="contact"  required>
									<div class="sign-up">
										<input type="reset" value="Reset">
										<input type="submit" name="signup"  value="Sign Up" >
										<div class="clear"> </div>
									</div>
								</form>

							</div>
						</div>
					</div>		
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<div class="login">
								<div class="buttons">


								</div>
								<form name="login" action="" method="post">
									<input type="text" class="text" name="uemail" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>

									<input type="password" value="" name="password" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

									<div class="p-container">

										<div class="submit two">
											<input type="submit" name="login" value="LOG IN" >
										</div>
										<div class="clear"> </div>
									</div>

								</form>
							</div>
						</div> 
					</div> 			        					 
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<div class="login">
								<div class="buttons">


								</div>
								<form name="login" action="" method="post">
									<input type="text" class="text" name="femail" value="" placeholder="Enter your registered email" required  ><a href="#" class=" icon email"></a>
									
									<div class="submit three">
										<input type="submit" name="send" onClick="myFunction()" value="Send Email" >
									</div>
								</form>
							</div>
						</div>           	      
					</div>	
				</div>	
			</div>
		</div>
	</div>


   <!-- Theme JS Files -->
<!--===============================================================================================-->
	<!-- <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
	
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/front/js/slick-custom.js"></script>
	
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
	
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
	
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

	<!--===============================================================================================-->
	<script src="js/front/js/main.js"></script>

   <!-- End Here -->


</body>
</html>