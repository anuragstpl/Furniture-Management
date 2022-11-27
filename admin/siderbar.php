<aside>
  <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" id="nav-accordion">
     <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
     <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
     <li class="mt">
      <a href="change-password.php">
        <i class="fa fa-file"></i>
        <span>Change Password</span>
      </a>
    </li>
    <li class="sub-menu">
      <a href="manage-users.php" >
        <i class="fa fa-users"></i>
        <span>Manage Users</span>
      </a>
    </li>
    <li class="sub-menu">
      <a href="manage-orders.php" >
        <i class="fa fa-users"></i>
        <span>Manage Order</span>
      </a>
    </li>
  </ul>
</div>
</aside>