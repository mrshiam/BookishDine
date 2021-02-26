<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin'])&& $_SESSION['userRole'] !=1 ){
	header('location:signinForm.php');
}?>
<div class="container">
<div class="row">
<?php include_once 'template/side_bar.php';?>

	<div class="col-lg-9">
		<div class="row">
		<div class="col-md-3">
		  
		  <a href = "book_entryForm.php"><img class="img-fluid" src="img/book_entry.png" alt="book_entry" width="460" height="345"></a> 
		  <h6>Book Entry</h6>
		</div>
		
		<div class="col-md-3">
		  
		  <a href = "upcoming_bookForm.php"><img class="img-fluid" src="img/upbook.png" alt="Upcomingbook_entry" width="460" height="345"></a>
		  <h6>Upcoming Book Entry</h6>
		</div>
		
		<div class="col-md-3">
		  
		  <a href = "order.php"><img class="img-fluid" src="img/quick-order.png" alt="Order" width="460" height="345"> </a>
		  <h6>Orders</h6>
		</div>
		</div>
	</div>
	

</div>
</div>