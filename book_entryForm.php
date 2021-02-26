
<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin'])&& $_SESSION['userRole'] !=1 ){
	header('location:signinForm.php');
}?>
<div class="container">
<div class="row">
<?php include_once 'template/side_bar.php';?>
<div class="col-lg-9">
<div class="container-fluid text-center">
	
 <form class="bookUpdate"  action="book_entry.php" method="POST" enctype="multipart/form-data">
 <div class="title-image">
  <img src="img/banner-books.jpg" class="img-responsive" alt="Post Story">
  <div class="title-text"><h1>Book Entry</h1></div>
</div>
  
	 <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="b_name" class="form-control" placeholder="Book Name">
    </div>
    <div class="col-sm-6 entry_input">
      <input type="text" name="a_name" class="form-control" placeholder="Author name">
    </div>
  </div>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="b_price" class="form-control" placeholder="Price">
    </div>
	<div class="col-sm-6 entry_input">
      <input type="text" name="b_quan" class="form-control" placeholder="Quantity">
    </div>
    
  </div>
  <div class="form-row entry_input">
    <div class="col-sm-12 entry_input">
      <textarea class="form-control" name="b_blurb" placeholder="Write Blurb Here" rows="3"></textarea>
    </div>
    <div class="col-sm-6 entry_input">
    <label for="image_entry">Upload Image</label>
    <input type="file" name="imagefileUpload" class="form-control-file" id="image_entry">
	
	</div>
  </div>
  <button type="submit" class="btn">Submit</button>
 
</form>
  
  
  
  
</div>
</div>
</div>
</div>
<?php include_once 'template/footer.php';?>