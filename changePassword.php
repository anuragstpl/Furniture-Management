   <?php
   include 'user/header.php';
   include 'user/changepassword.php';
  /* echo '<pre>';
   print_r($return);
   die();*/
   ?>
   <div class="container">
   	<header class="jumbotron hero-spacer">
   		<h2 class="text-center">Welcome! <?php echo $_SESSION['name'];?></h2>
   		<?php 
   		if(!empty($return['msg'])){
   			echo "<p id='succesmsg' class='text-center succesmsg'>".$return['msg']."</p>";
   		}
   		?>
   		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" id="profile">
   			<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
            <div class="form-group">
              <label for="exampleInputPassword1">Old Password</label>
              <input required="required" type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Old Password">
           </div>
           <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input required="required" type="password" name="newpassword" class="form-control" id="newpassword" placeholder="New Password">
         </div>  
         <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input required="required" type="password" name="confirmpassword" class="form-control" id="confirmpassword" placeholder="Confirm Password">

         </div>			
         <input type="submit" class="btn btn-primary" name="Submit" value="UPDATE">
      </form>
   </header>
   <hr>
</div>
<?php  include 'user/footer.php'; ?>
