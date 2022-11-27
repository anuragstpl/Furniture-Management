<?php  include 'header.php'; ?>
  <section class="wrapper">
   <h3><i class="fa fa-angle-right"></i> Manage Users</h3>
   <div class="row">
    <div class="col-md-12">
      <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
         <h4><i class="fa fa-angle-right"></i> All User Details </h4>
         <hr>
         <thead>
          <tr>
            <th>Sno.</th>
            <th class="hidden-phone">First Name</th>
            <th> Last Name</th>
            <th> Email Id</th>
            <th>Contact no.</th>
            <th>Reg. Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $ret=mysqli_query($con,"select * from users");
          $cnt=1;
          while($row=mysqli_fetch_array($ret))
           {?>
            <tr>
              <td><?php echo $cnt;?></td>
              <td><?php echo $row['fname'];?></td>
              <td><?php echo $row['lname'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['contactno'];?></td>  <td><?php echo $row['posting_date'];?></td>
              <td>

               <a href="update-profile.php?uid=<?php echo $row['id'];?>"> 
                 <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                 <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
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
