<?php require_once('session.php');
  
  $sql = "SELECT * FROM guest_info where jstatus = 0";
  $result  = $conn->query($sql); 
  require_once('header.php');

  if(isset($_POST['update'])){ 
    $jstatus = $_POST['jstatus'];
    $_SESSION['jstatus'] = $jstatus;
   
    $id = $_POST['id'];

    $updateStatus = "UPDATE guest_info SET jstatus = '$jstatus' WHERE id = '$id'";
    $updateResult = $conn->query($updateStatus);

    if($updateResult){      
      $_SESSION['message'] = "Updated Guest Application !!";
    }
    header("location: main.php");
  }
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
        <?php 
          if(isset($_SESSION['message']))
            if(isset($_SESSION['jstatus']) &&  $_SESSION['jstatus'] == 1){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>".$_SESSION['message'].
              "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }else{
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>".$_SESSION['message'].
              "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
        ?>
        
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

              <form action="" method="post">
              <td>   
                <input type="hidden" value="<?php echo $row['id'];?>" name="id">             
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jstatus" value="1">
                      <label class="form-check-label"> Forward</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="jstatus" value="2">
                      <label class="form-check-label"> Reject </label>
                  </div>
              </td>
              <td>
                  <button type="submit" class="btn btn-success" name="update">Submit</button>
              </td>
              </form>
              
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