<?php require_once('session.php'); 
  $sql = "SELECT * FROM guest_info where jstatus = 1";
  $result  = $conn->query($sql); 
  require_once('header.php');

?> 
    
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">Approved Guest List</div>
      <div class="col-6 text-end">Login as : <?php echo $_SESSION['utype'];?></div>
    </div>
  </div>
  <div class="card-body">
  <div class="row">
      <div class="col-12">
        <table id="akash" class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Ser No</th>
              <th>Guest Name</th>
              <th>Guest Address</th>
              <th>Invited By</th>
              <th>Relation</th>
              <th>Duration</th>
              <th>Applicants's Office</th>
              <th>Visit date</th>
            </tr>
          </thead>
          <tbody>

            <?php  $sl = 1; while($row = mysqli_fetch_assoc($result)){?>
            <tr>
              <td><?php echo $sl; ?></td>
              <td><?php echo $row['guest_name'];?></td>
              <td><?php echo $row['guest_address'];?></td>
              <td><?php echo $row['invited_by'];?></td>
              <td><?php echo $row['relation'];?></td>
              <td><?php echo $row['duration'];?></td>
              <td><?php echo $row['applicant_office'];?></td>
              <td><?php echo $row['visit_date'];?></td>
            </tr>            
            <?php $sl++; } ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<br> 
    <?php require_once('../footer.php');?>
 
</body>
</html>