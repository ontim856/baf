<?php 
  require_once('session.php'); 
  $sql = "SELECT * FROM guest_info";
  $result  = $conn->query($sql); 
  require_once('header.php');
?> 
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-6">Guest List</div>
      <div class="col-6 text-end">Login as : <?php echo $_SESSION['utype'];?></div>
    </div>
  </div>
  <div class="card-body">
  <div class="row">
      <div class="col-12">
        <table class="table table-bordered table-info">
          <thead>
            <tr>
              <th>Ser No</th>
              <th>Guest Name</th>
              <th>Guest Address</th>
              <th>Invited By</th>
              <th>Relation</th>
              <th>Duration</th>
              <th>Applicants's Office</th>
              <th>Visit date</th>
              <th>Approval</th>
              <th>Action</th>
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
              <td>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
                      <label class="form-check-label">
                        Approve
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                      <label class="form-check-label">
                        Not Approve
                      </label>
                  </div>
              </td>
              <td>
                  <button type="button" class="btn btn-success">Submit</button>
              </td>
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