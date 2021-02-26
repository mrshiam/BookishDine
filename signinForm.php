
<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>

<section class="signin-page account">
  <div class="container">
    <div class="row" id="inbox">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.php">
            <img src="img/book-and-pen.png" alt="logo" style="width:40px";>
          </a>
		 
          <h2 class="text-center">Welcome Back</h2>
		  <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
          <form class="text-left clearfix" action="signin.php" method='POST' >
            <div class="form-group">
              <input type="email" name="eMail" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="passWord" class="form-control" placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center" >Login</button>
            </div>
          </form>
          <p class="mt-20">New in this site ?<a href="signupForm.php"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once 'template/footer.php';?>
