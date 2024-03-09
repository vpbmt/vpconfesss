<?php
session_start();
$page_title = "Resend";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
      <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>".$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                    ?>
        <div class="card">
          <div class="card-header">
            <h5>Resend Email Verification</h5>
          </div>
          <div class="card-body">
            <form action="resend-code.php" method="POST">
              <label for="email">Email Address</label>
              <div class="form-group mb-3">
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email Address">
              </div>
              <button type="submit" name="resend_email_verify_btn" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('includes/footer.php'); ?>