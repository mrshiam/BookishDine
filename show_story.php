<?php include_once 'template/head.php'?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin']) ){
	header('location:signinForm.php');
}?>
<div class="page-wrapper">
	<div class="container">
	<?php
			include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM story";
			$output = $conn->query($sql);
			foreach($output AS $row){
		
		?>
	
		<div class="row">
		<div class="col-md-2"></div>
      		<div class="col-md-6">
			<form method="post" action="show_story.php?action=add&id=<?php echo $row['story_id'];?>">
		        <div class="post">
		          <div class="post-thumb">
		            <a href="">
		              <img class="img-responsive" src="img/<?=$row['story_image']?>" alt="" width="500px">
		            </a>
		          </div>
		          <h2 class="post-title"><a href="single_story.php?storyid=<?php echo $row['story_id'];?>"><?=$row['story_title']?></a></h2>
		          <div class="post-meta">
		            <ul>
		              <li>
		                <i class="fas fa-calendar-day"></i> <?=$row['post_date']?>
		              </li>
		              <li>
		                <i class="fas fa-user-tie"></i> POSTED BY <?=$row['story_writer']?>
		              </li>
		              
		            </ul>
		          </div>
		          <div class="post-content">
		            <p><?=$row['main_story']?> </p>
		            <a href="single_story.php?storyid=<?php echo $row['story_id'];?>" class="btn btn-main">Continue Reading</a>
		          </div>
				</div>
				</form>
        	</div>
			<div class="col-md-2"></div>
		</div>
			<?php } ?>
	</div>
</div>
<?php include_once 'template/story_message.php'?>
<?php include_once 'template/footer.php';?>