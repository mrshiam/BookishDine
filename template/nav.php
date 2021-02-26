<?php session_start(); ?>
<nav class="navbar navbar-expand-md sticky-top">
	<a class="navbar-logo" href="index.php"><img src="img/book-and-pen.png" alt="Logo" style="width:40px;margin-bottom:10px;"></a>
  <a class="navbar-brand" href="index.php">Bookish Dine</a>

  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i>Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="books.php"><i class="fas fa-book"></i>Book Store</a>
      </li>
	  <?php if(isset($_SESSION['loggedin'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="show_story.php"><i class="fas fa-blog"></i>Story</a>
      </li> 
	  <?php } ?>
	  <?php if(!isset($_SESSION['loggedin'])){?>
	  <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i>Account</a>
		<div class="dropdown-menu">
		  <a class="nav-link" href="signinForm.php"><i class="fas fa-user-plus"></i>Sign In</a>
		  <a class="nav-link" href="signupForm.php"><i class="fas fa-sign-in-alt"></i>Sign Up</a>
		</div>
      </li>
	  <?php } ?>
	  <li class="nav-item">
        <a class="nav-link" href="bookscart.php"><i class="fas fa-shopping-basket"></i>Cart</a>
      </li>
	  <?php if(isset($_SESSION['loggedin'])&& $_SESSION['userRole']==1){ ?>
	  <li class="nav-item">
        <a class="nav-link" href="admin_dash.php"><i class="fas fa-user-shield"></i>Admin Dashboard</a>
      </li>
	  <?php } ?>
	  <?php if(isset($_SESSION['loggedin'])){ ?>
	  <li class="nav-item dropdown">
		 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-circle"></i><?php echo $_SESSION['userName']?></a>
		<div class="dropdown-menu">
		  <a class="nav-link" href="logOut.php"><i class="fas fa-user-plus"></i>Logout</a>
		</div>
      </li>
	  <?php } ?>
    </ul>
  </div> 
</nav>