<?php
include 'header.php';
if(isset($_POST['Submit']))
{
  $oldpassword=md5($_POST['oldpass']);
  $sql=mysqli_query($con,"SELECT password FROM admin where password='$oldpassword'");
  $num=mysqli_fetch_array($sql);
  if($num>0)
  {
    $adminid=$_SESSION['id'];
    $newpass=md5($_POST['newpass']);
    $ret=mysqli_query($con,"update admin set password='$newpass' where id='$adminid'");
    $_SESSION['msg']="Password Changed Successfully !!";
//header('location:user.php');
  }
  else
  {
    $_SESSION['msg']="Old Password not match !!";
  }
}
?>
<script language="javascript" type="text/javascript">
  function valid()
  {
    if(document.form1.oldpass.value=="")
    {
      alert(" Old Password Field Empty !!");
      document.form1.oldpass.focus();
      return false;
    }
    else if(document.form1.newpass.value=="")
    {
      alert(" New Password Field Empty !!");
      document.form1.newpass.focus();
      return false;
    }
    else if(document.form1.confirmpassword.value=="")
    {
      alert(" Re-Type Password Field Empty !!");
      document.form1.confirmpassword.focus();
      return false;
    }
    else if(document.form1.newpass.value.length<6)
    {
      alert(" Password Field length must be atleast of 6 characters !!");
      document.form1.newpass.focus();
      return false;
    }
    else if(document.form1.confirmpassword.value.length<6)
    {
      alert(" Re-Type Password Field less than 6 characters !!");
      document.form1.confirmpassword.focus();
      return false;
    }
    else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
    {
      alert("Password and Re-Type Password Field do not match  !!");
      document.form1.newpass.focus();
      return false;
    }
    return true;
  }
</script>
<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Change Password </h3>
 <div class="row">
  <div class="col-md-12">
    <div class="content-panel">
     <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
       <!-- <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg'] = "";?></p> -->
       <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Old Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="oldpass" value="" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">New Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="newpass" value="" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Confirm Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="confirmpassword" value="" >
        </div>
      </div>
      <div style="margin-left:100px;">
        <input type="submit" name="Submit" value="Change" class="btn btn-theme"></div>
      </form>
    </div>
  </div>
</div>
</section>
<?php  include 'footer.php'; ?>

