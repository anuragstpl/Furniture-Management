   <?php
   include 'user/header.php';
   include 'user/getProducts.php';
   if(isset($_GET['id'])){
      $pid = $_GET['id'];
      include 'user/deleteProduct.php';
   }
   ?>
   <div class="container">
   	<header class="jumbotron hero-spacer">
   		<h2 class="text-center">Welcome! <?php echo $_SESSION['name'];?></h2>
         <?php 
         if(!empty($return['msg'])){
            echo "<p id='succesmsg' class='text-center succesmsg'>".$return['msg']."</p>";
         }
         ?>
         <div class="row">            
            <div class="col-lg-12">            
               <a href="<?php echo BASE_URL ?>/order"" class="btn btn-primary">Add</a>
            </div>
            <div class="col-lg-12">
               <table class="table table-hover">
                <thead>
                 <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
               if(!empty($results)){

                  foreach ($results as $result) {?>
                  <tr>
                     <th scope="row">
                        <?php 
                        if(empty($result['image'])){?>
                        <img width="100px" height="90px" src="images/placeholder.png" alt="IMG-BENNER">
                        <?php }else{?>
                        <img width="100px" height="90px" src="uploads/<?php echo $result['image']?>" alt="IMG-BENNER">
                        <?php }
                        ?>

                     </th>
                     <td><?php echo $result['name']?></td>
                     <td><?php echo $result['price']?></td>
                     <td>
                        <?php
                        if($result['feature'] === '1'){
                           $featured = '<span class="label label-success">ACTIVE</span>';
                        }else{
                           $featured = '<span class="label label-danger">UNACTIVE</span>';
                        }
                        echo $featured;
                        ?>

                     </td>
                     <td><a href="<?php echo BASE_URL ?>/edit_order?id=<?php echo $result['id']?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;<a href="<?php echo BASE_URL ?>/dashboard?id=<?php echo $result['id']?>"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;</td>
                  </tr>
                  <?php  }?>
                  <?php   } else {?>
                  <tr>
                     <td colspan="5" class="text-center">Record Not Found</td>
                  </tr>
                  <?php  }

                  ?>


               </tbody>
            </table>
         </div>
      </div>
   </header>
   <hr>
</div>

<?php  include 'user/footer.php'; ?>
