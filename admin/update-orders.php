<?php
 include 'header.php'; 

if(isset($_POST['Submit'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $details = $_POST['details'];
  
  if(isset($_POST['feature'])){
    if($_POST['feature'] === 'on'){
      $feature = 1;
    }else{
      $feature = 0;
    }
  }else{
    $feature = 0;
  }
  
  mysqli_query($con,"update products set name ='$name' ,price='$price' , details='$details' , feature ='$feature' where id='".$_GET['uid']."'");
  $_SESSION['msg']="Product Updated successfully";
}else{
  $_SESSION['msg']="";
}
?>

<?php $ret=mysqli_query($con,"select * from products where id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret))

 {?>
  <section class="wrapper">
     <h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Information</h3>
     <div class="row">
      <div class="col-md-12">
        <div class="content-panel">
          <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
          <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
           <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'];?>" >
           <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product Name </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" >
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>" >
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Product Details </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="details" value="<?php echo $row['details'];?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image</label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" name="image" value="<?php echo $row['image'];?>" > -->
              <?php 
              if($row['image']!==''){?>
              <img width="200px" height="190px" src="../uploads/<?php echo $row['image']?>" alt="IMG-BENNER">
              <?php   }
              ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Feature</label>
            <div class="col-sm-10">
              <?php 
              if($row['feature'] === '1'){
               $checked ='checked';
             }else{
               $checked ='';
             }
             ?>
             <input type="checkbox"  id="feature" name="feature" <?php echo $checked ?> >
           </div>
         </div>
         <div style="margin-left:100px;">
          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<?php  include 'footer.php'; ?>

