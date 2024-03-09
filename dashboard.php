<?php 
include('authentication.php');
$page_title="Dashboard";
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script type="text/javascript" src="confess.js">
</script>

<style>
.mained {
  width: fit-content;
  margin: 0 auto; 
  padding: 20px; 
  border: 1px solid #ddd; 
  border-radius: 5px; 
}

.form {
  display: flex; 
  flex-direction: column; 
  align-items: center; 
}

.form img {
  width: 100px; 
  height: auto; 
  margin-bottom: 10px; 
}

.pp {
  font-size: 20px; 
  font-weight: bold; 
  margin-bottom: 10px; 
}

.hh {
  font-size: 14px; 
  margin-bottom: 5px; 
}

#name {
  width: 100%; 
  padding: 10px; 
  border: 1px solid #ccc; 
  border-radius: 3px; 
  margin-bottom: 10px; 
}

#message {
  width: 100%; 
  height: 150px; 
  padding: 10px; /
  border: 1px solid #ccc; 
  border-radius: 3px; 
  margin-bottom: 10px; 
}

.button22 {
  display: flex;
  justify-content: center; 
}

.button22 input[type="button"] {
  padding: 10px 20px; 
  background-color: #4CAF50; 
  color: white; 
  border: none; 
  border-radius: 5px; 
  cursor: pointer; 
}

a {
  color: #333; 
  text-decoration: none; 
  font-weight: lighter; 
}

a:hover {
  color: blue; 
  text-decoration: underline; 
}

</style>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
                <input type="hidden" id="maill" value="<?= $_SESSION['auth_user']['username'];?>">
                <?php
                    if (isset($_SESSION['status'])) {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                <?php
                        unset($_SESSION['status']);
                    }
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>VP CONFESSIONS</h4>
                        </div>
                        <div class="card-body">
                            <div class="mained">
                                <form class="form" onsubmit="sendEmail(); reset(); return false;">
	                            	<img src="vplogo.png" alt="">
	                            	<h6 class="hh">Your Confessions will be not take your name,</h6>
	                            	<h6 class="hh">They are end-to-end encrypted</h6>

	                            	<h6 class="hh">we do not record any of your data</h6>
	                            	<input type="text" id="name" placeholder="Confession for">
	                            	<textarea id="message" rows="5" placeholder="Confess Here" required=" "></textarea>
	                            	<form method="post" class="button22">
	                            		<input type="button" value="Confess It"
	                            			onclick="sendEmail(); reset(); return false;" />
	                            	</form>
	                            </form>
                                <br>
                                <br>
                                <br>
	                            <a href="https://instagram.com/vpbaramaticonfessions?igshid=NTc4MTIwNjQ2YQ==">You can get Confessions by clicking here</a>
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
I
<?php include('includes/footer.php'); ?>