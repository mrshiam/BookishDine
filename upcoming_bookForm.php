<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin'])&& $_SESSION['userRole'] !=1 ){
	header('location:signinForm.php');
}?>
<div class="container">
<div class="row">
<?php include_once 'template/side_bar.php';?>
<div class="col-lg-9">
<div class="title-image">
  <img src="img/upimage.jpg" class="img-responsive" alt="Post Story">
  <div class="title-text"><h1>Upcoming Book</h1></div>
	</div>
<div class="container-fluid text-center upbook_table">

  <div>
	<h3 class="title_head">Upcoming Book List</h3>
		 <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
			<div>
				<table class="table table-hover table-fixed" style="height: 400px;">
				
					<tr>
						<th class="th-lg">Book Name</th>
						<th class="th-lg">Author Name</th>
						<th class="th-lg">Remove</th>
						
					</tr>
				

		 <?php
			include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM upcoming_book";
			$output = $conn->query($sql);
			foreach($output AS $row){
				?>

					<tr>
						<td><?php echo $row["ubook_name"]; ?></td>
						<td><?php echo $row["ubook_author"]; ?></td>
						<td>
							<form action="delete_upbook.php?up_ID=<?=$row['ubook_id'];?>" method="POST">
							<input type = "submit" class="btn" name="delete_btn" value="Delete"></input>
							
							</form>
						
						
						
						</td>
					</tr>
				<?php
					}
				?>
						
				</table>
			</div>
			</div>
  
  
  
  
  </div>
	
 <form class="bookUpdate"  action="upcoming_book.php" method="POST" enctype="multipart/form-data">
	<h3 class="title_head text-center">Insert Upcoming Book</h3>
   <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="ubook_name" class="form-control" placeholder="Book Name">
    </div>
    <div class="col-sm-6 entry_input">
      <input type="text" name="uauthor_name" class="form-control" placeholder="Author name">
    </div>
  </div>
 
  <div class="form-row entry_input">
    
    <div class="col-sm-6 entry_input">
    <label for="image_entry">Upload Image</label>
    <input type="file" name="ubook_imagefileUpload" class="form-control-file" id="image_entry">
	<button type="submit" class="btn">Submit</button>
	</div>
  </div>
 
</form>
  
  
  
  
</div>