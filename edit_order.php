   <?php
   include 'user/header.php';
   include 'user/updateProduct.php';
   include 'modal.php';
   ?>
   <div class="container">
   	<header class="jumbotron hero-spacer">
   		<h2 class="text-center">Welcome! <?php echo $_SESSION['name'] ?></h2>
      <?php 
      if(!empty($return['msg'])){
        echo "<p id='succesmsg' class='text-center succesmsg'>".$return['msg']."</p>";
      }
      ?>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $result['id']; ?>" method="Post" id="profile" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
        <div class="form-group">
         <label for="pname">Name</label>
         <input type="text" name="pname" required="required" class="form-control" id="pname" aria-describedby="pname" placeholder="Enter Product Name" value="<?php echo $result['name']?>">
       </div>
       <div class="form-group">
         <label for="product_price">Price</label>
         <input type="text" name="product_price" required="required" class="form-control" id="product_price" aria-describedby="product_price" placeholder="Enter Product price" value="<?php echo $result['price']?>">
       </div>
       <div class="form-group">
         <label for="product_details">Details</label>
         <textarea type="text" name="product_details" required="required" class="form-control" id="product_details" aria-describedby="product_details" placeholder="Enter Product Deatiks" cols="20" rows="10"><?php echo $result['details']?></textarea> 
       </div>
       <div class="form-group">
        <label for="image">Image</label><br/>
        <?php 
        if($result['image']!==''){?>
        <img width="200px" height="190px" src="uploads/<?php echo $result['image']?>" alt="IMG-BENNER"><a class="btn btn-danger" href="javascript:void(0)" id="test" data-id ="<?php echo $result['image'] ?>" title="Delete Image" style="position: absolute;" onclick='show(<?php echo $result['id'] ?>)'>X</a>
        <input type ="hidden" name="image" class="form-control" id="image" value="<?php echo $result ['image'] ?>"> 
        <?php   }else{?>
        <input type="file" name="image" class="form-control" id="image" aria-describedby="image"> 

        <?php }
        ?>
      </div>
      <!-- <div class="form-group">
       <label for="feature">Feature</label><br/>
       <?php 
       if($result['feature'] === '1'){
         $checked ='checked';
       }else{
         $checked ='';
       }
       ?>
       <input type="checkbox" name="feature"  id="feature" <?php echo $checked ?> aria-describedby="feature"> 
     </div> -->
     <input type="submit" class="btn btn-primary" name="Submit" value="Update">
   </form>
 </header>
 <hr>
</div>

<script type="text/javascript">   
  /*Delete Product Image via Ajax*/
  function show(vars){
    var result = confirm("Are you Sure to delete this image !");

    var base_url = '<?php echo BASE_URL ?>/dashboard';
    if (result) {
    //Logic to delete the item
    var id = vars;
    $imagename = $("#test").attr("data-id");
    $.ajax
    ({ 
      url: 'deleteImage.php',
      data: {"imageid": id,"imagename":$imagename},
      type: 'post',
      success: function(result)
      {
        /*console.log(result);*/
        $("#successModal").modal("toggle");
        $(".modal-body").html('<p class="text-center"> Image Delete Successfully. !</p>');
        $('#close').attr('href', base_url);
      },
      error: function(result){
        alert("fail");
      }
    });
  }
}
/*End Here*/
</script>
<?php  include 'user/footer.php'; ?>
