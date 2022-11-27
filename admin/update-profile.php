<?php
include 'header.php'; 

if(isset($_POST['Submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contact=$_POST['contact'];
	mysqli_query($con,"update users set fname='$fname' ,lname='$lname' , contactno='$contact' where id='".$_GET['uid']."'");
  $_SESSION['msg']="Profile Updated successfully";
}
?>

<?php $ret=mysqli_query($con,"select * from users where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret))
 {?>
  <section class="wrapper">
   <h3><i class="fa fa-angle-right"></i> <?php echo $row['fname'];?>'s Information</h3>
   <div class="row">
    <div class="col-md-12">
      <div class="content-panel">
        <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
        <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
         <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
         <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly >
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Contact no. </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="contact" value="<?php echo $row['contactno'];?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Registration Date </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="contact" value="<?php echo $row['posting_date'];?>" readonly >
          </div>
        </div>

        <div style="margin-left:100px;">
          <input type="submit" name="Submit" value="Update" class="btn btn-theme">
        </div>

      </form>
    </div>
  </div>
</div>
</section>
<?php } ?>
<?php include 'footer.php'; ?>