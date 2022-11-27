   <?php
   include 'user/header.php';
   include 'user/product.php';
   ?>
   <div class="container">
   	<header class="jumbotron hero-spacer">
   		<h2 class="text-center">Welcome! <?php echo $_SESSION['name'] ?></h2>
   		<?php 
   		if(!empty($return['msg'])){
   			echo "<p id='succesmsg' class='text-center succesmsg'>".$return['msg']."</p>";
   		}
   		?>
   		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post" id="profile" enctype="multipart/form-data">
   			<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
   			<div class="form-group">
   				<label for="pname">Name</label>
   				<input type="text" name="pname" required="required" class="form-control" id="pname" aria-describedby="pname" placeholder="Enter Product Name" value="">
         </div>
         <div class="form-group">
           <label for="product_price">Price</label>
           <input type="text" name="product_price" required="required" class="form-control" id="product_price" aria-describedby="product_price" placeholder="Enter Product price" value="">
         </div>
         <div class="form-group">
           <label for="product_details">Details</label>
           <textarea type="text" name="product_details" required="required" class="form-control" id="product_details" aria-describedby="product_details" placeholder="Enter Product Details" cols="20" rows="10"></textarea> 
         </div>
         <div class="form-group">
           <label for="image">Image</label>
           <input type="file" name="image" required="required" class="form-control" id="image" aria-describedby="image"> 
         </div>

        <!--  <div class="form-group">
           <label for="feature">Feature</label><br/>
           <input type="checkbox" name="feature"  id="feature" aria-describedby="feature"> 
         </div> -->
         
         <input type="submit" class="btn btn-primary" name="Submit" value="Save">
       </form>
     </header>
     <hr>
   </div>

   <?php  include 'user/footer.php'; ?>
