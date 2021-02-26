<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin'])){
	header('location:signinForm.php');
}?>
<div class="container" style="margin-top:50px;">
<div class="row">
<div class="col-lg-6 bg text-center" >
	<h2>Share Your Story</h2>
	 
	<img src="img/postStory.png" class="img-responsive" alt="Post Story" width="500" height="500"> 
</div>
<div class="col-lg-6 content">
<div class="container-fluid text-center">
	
 <form class="post_story"  action="story.php" method="POST" enctype="multipart/form-data">
 <h2> Write your story </h2>
   <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
  <div class="form-row">
    <div class="col-sm-6 entry_input">
      <input type="text" name="s_titile" class="form-control" placeholder="Write the story title">
    </div>
    <div class="col-sm-6 entry_input">
      <input type="text" name="w_name" class="form-control" placeholder="Write Your Name">
    </div>
  </div>
 
  <div class="form-row entry_input">
    <div class="col-sm-12 entry_input">
      <textarea class="form-control" name="story_body" placeholder="Write Story Here" rows="6"></textarea>
    </div>
	<div class="col-sm-8 entry_input">
    <label for="image_entry">Upload Image</label>
    <input type="file" name="storyImage" class="form-control-file" id="image_entry2">
	
	</div>
   
  </div>
 <button type="submit" class="btn">Post Story</button>
</form>
 
  
  
  
</div>
</div>
</div>
</div>
<?php include_once 'template/footer.php';?>