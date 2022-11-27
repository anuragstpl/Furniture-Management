<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();
if(isset($_GET['id'])){
  $adminid = $_GET['id'];
  $msg = mysqli_query($con,"delete from users where id='$adminid'");
  if($msg)
  {
    echo "<script>alert('Data deleted');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Admin | Manage Users</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>

  <section id="container" >
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <a href="#" class="logo"><b>Admin Dashboard</b></a>
      <div class="nav notify-row" id="top_menu">
      </ul>
    </div>
    <div class="top-menu">
     <ul class="nav pull-right top-menu">
      <li><a class="logout" href="logout.php">Logout</a></li>
    </ul>
  </div>
</header>
<?php  include 'siderbar.php'; ?>
<section id="main-content">
