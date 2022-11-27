   <?php
   include 'user/header.php';
   include 'user/userProfile.php';
   ?>
   <div class="container">
   	<header class="jumbotron hero-spacer">
   		<h2 class="text-center">Welcome! <?php echo $result['fname'].' '.$result['lname'];?></h2>
   		<?php 
   		if(!empty($return['msg'])){
   			echo "<p id='succesmsg' class='text-center succesmsg'>".$return['msg']."</p>";
   		}
   		?>
   		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" id="profile">
   			<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
   			<div class="form-group">
   				<label for="exampleInputEmail1">First Name</label>
   				<input type="text" name="fname" class="form-control" id="exampleInputfname" aria-describedby="fname" placeholder="Enter First Name" value="<?php echo $result['fname'] ?>">
           </div>
   			<div class="form-group">
   				<label for="exampleInputEmail1">Last Name</label>
   				<input type="text" name="lname" class="form-control" id="exampleInputlname" aria-describedby="lname" placeholder="Enter Last Name" value="<?php echo $result['lname'] ?>">
           </div>
   			<div class="form-group">
   				<label for="exampleInputEmail1">Email address</label>
   				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $result['email'] ?>">
           </div>
           <div class="form-group">
   				<label for="exampleInputPassword1">Contact Number</label>
   				<input type="text" name="contactno" class="form-control" id="exampleInputcontactno" placeholder="Contact Number" value="<?php echo $result['contactno'] ?>">
   			</div>
   			
   			<input type="submit" class="btn btn-primary" name="Submit" value="Submit">
   		</form>
   	</header>
   	<hr>
   </div>

   <?php  include 'user/footer.php'; ?>
