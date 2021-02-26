
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
<?php
		$activebookid = $_GET['bookid'];
		include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM books WHERE bookID='$activebookid'";
			$output = $conn->query($sql);
			foreach($output AS $row){
				

?>
 <form class="bookUpdate"  action="update.php" method="POST" enctype="multipart/form-data">
  <div class="title-image">
  <img src="img/update.jpg" class="img-responsive" alt="Post Story">
  <div class="title-text"><h1>Update Book</h1></div>
	</div>
   <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="upbook_nam" class="form-control" placeholder="<?=$row['bookName']?>">
    </div>
    <div class="col-sm-6 entry_input">
      <input type="text" name="upauthor_nam" class="form-control" placeholder="<?=$row['authorName']?>">
    </div>
  </div>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="upbook_price" class="form-control" placeholder="<?=$row['price']?>">
    </div>
	<div class="col-sm-6 entry_input">
      <input type="text" name="upbook_quan" class="form-control" placeholder="<?=$row['quantity']?>">
    </div>
    
  </div>
  <div class="form-row entry_input">
    <div class="col-sm-12 entry_input">
      <textarea class="form-control" name="upbook_blurb" placeholder="<?=$row['blurb']?>" rows="3"></textarea>
    </div>
    <div class="col-sm-6 entry_input">
    <label for="image_entry">Upload Image</label>
    <input type="file" name="upimagefileUpload" class="form-control-file" id="image_entry">
	</div>
  </div>
	
  <button type="submit" class="btn">Update</button>
 <?php } ?>
</form>
  
  
  
  
</div>
</div>
</div>
</div>
<?php include_once 'template/footer.php';?>