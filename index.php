<?php
require_once('config.php');

if(isset($_POST['sub'])){
  $guestName = $_POST['guest_name'];
  $address = $_POST['guest_address'];
  $invitedBy = $_POST['invited_by'];
  $relation = $_POST['relation'];
  $Duration = $_POST['duration'];
  $applicantOffice = $_POST['applicant_office'];
  $visitDate = $_POST['visit_date'];  

  $sql = "INSERT INTO guest_info (guest_name,guest_address,invited_by,relation,duration,applicant_office,visit_date) 
  values('$guestName','$address','$invitedBy','$relation', '$Duration','$applicantOffice','$visitDate')";

 $insert =  $conn->query($sql);

 if($insert){
  header("Location: main.php");
 }  
}
require_once('header.php');
?> 
  <form action='' method='post'>
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Name of Guest :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" type="text" id="name" name="guest_name" required>
        </div>
      </div>
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Address :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" id="name" name="guest_address" >
        </div>
      </div> 
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Invited by :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control"id="name" name="invited_by">
        </div>
      </div> 
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Relation with the Inviter :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" id="name" name="relation">
        </div>
      </div> 
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Approx. Staying duration inside Base :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" id="name" name="duration">
        </div>
      </div> 
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Applicant’s Name and Office :</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" id="name" name="applicant_office" >
        </div>
      </div> 
      <div class="form-group row m-2">
        <label class="col-sm-4 col-form-label">Visit Date:</label>
        <div class="col-sm-8">
          <input type="date"  class="form-control" id="date" name="visit_date">
        </div>
      </div> 
      <div class="form-group row m-2">
          <div class="col-6 mt-4 mb-2">
                <a href="login.php" class="btn btn-success"> Login</a>
          </div>
          <div class="col-6 text-end mt-4 mb-2">
                <input class="btn btn-primary" type="submit" value="Submit" name="sub">
          </div>
      </div>
  </form>


  <?php require_once('footer.php');?> 

</body>
</html>