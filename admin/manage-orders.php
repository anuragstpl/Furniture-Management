<?php  include 'header.php'; 
if(isset($_GET['id'])){
  $pid = $_GET['id'];
  $msg = mysqli_query($con,"delete from products where id='$pid'");
  if($msg)
  {
    echo "<script>alert('Data deleted');</script>";
  }
}
?>
<section class="wrapper">
 <h3><i class="fa fa-angle-right"></i> Manage Orders</h3>
 <div class="row">
  <div class="col-md-12">
    <div class="content-panel">
      <table class="table table-striped table-advance table-hover">
       <h4><i class="fa fa-angle-right"></i> All User Orders </h4>
       <hr>
       <thead>
        <tr>
          <th>Sno.</th>
          <th>Image</th>
          <th class="hidden-phone">Name</th>
          <th> Price</th>
          <th> Details</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $ret = mysqli_query($con,"select * from products");
        $cnt=1;
        while($row=mysqli_fetch_array($ret))
         {?>
          <tr>
            <td><?php echo $cnt;?></td>
            <td><img width="80px" height="60px" src="../uploads/<?php echo $row['image'];?>"></td> 
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['details'];?></td>
            <td>
              <?php
              if($row['feature'] === '1'){
                $featured = '<span class="label label-success">ACTIVE</span>';
              }else{
                $featured = '<span class="label label-danger">UNACTIVE</span>';
              }
              echo $featured;
              ?></td>
              <td>

               <a href="update-orders.php?uid=<?php echo $row['id'];?>"> 
                 <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                 <a href="manage-orders.php?id=<?php echo $row['id'];?>"> 
                   <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                 </td>
               </tr>
               <?php $cnt=$cnt+1; }?>

             </tbody>
           </table>
         </div>
       </div>
     </div>
   </section>
   <?php  include 'footer.php'; ?>