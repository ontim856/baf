<?php session_start();
    require_once("config.php");
    if(isset($_POST['sub'])){
      $userName = $_POST['uname'];
      $password= $_POST['passwd'];
      $sql ="SELECT * FROM users WHERE uname= '$userName' AND passwd= '$password'";
      $query = $conn->query($sql);
      $result = mysqli_fetch_assoc($query);
      $status = "";
      $userType = "";
      
      if($result){
        $_SESSION['utype'] = $result ['utype'];
          if($result ['status'] == 1){
            if($_SESSION['utype'] == 'jcoic'){
              header("location: jcoic/main.php");
            }
            if($_SESSION['utype'] == 'syoffr'){
              header("location: syoffr/main.php");
            }
            if($_SESSION['utype'] == 'guardroom'){
              header("location: guardroom/main.php");
            }
            if($_SESSION['utype'] == 'admin'){
              header("location: admin/main.php");
            }
          }
      }else{
        $_SESSION['message'] = "Incorrect User Name or Password";
      }
    } 
 require_once('header.php'); 
?>
      <div class="row">
          <div class="col-12 text-center mb-4">
              <h3 style="text-align:center">Sign Up</h3>
          </div>
      </div>
      <div class="row">
        <div class="offset-3 col-6">
        <?php
          if(isset($_SESSION['message']))
            echo "<p class='alert alert-danger'>".$_SESSION['message']."</p>";
            unset($_SESSION['message']);          
        ?>

        <form action="" method="post">
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">User Name</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control" id="staticEmail" name="uname">
            </div>
          </div>
          <div class="form-group row mt-4">
            <label for="staticEmail" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password"  class="form-control" id="staticEmail" name="passwd">
            </div>
          </div>
            <div class="row">
            <div class="col-6 form-check mt-5 text-end">&nbsp;</div>
              <div class="col-6 text-end mt-5">
                    <input class="btn btn-primary" type="submit" value="Submit" name="sub">
              </div>
            </div>
        </form>
        </div>
      </div>
      <br>  

     <?php require_once('footer.php'); ?>
                     
</body>
</html>