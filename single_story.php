<?php include_once 'template/nav.php';?>
<?php include_once 'template/head.php'?>
<?php if(!isset($_SESSION['loggedin'])){
	header('location:signinForm.php');
}?>
<?php include_once 'databaseConnect.php';

		$id=$_GET['storyid'];
			$conn=connect();
	
			$sql = "SELECT * FROM story WHERE story_id=$id";
			$singleStory = $conn->query($sql);
			foreach ($singleStory as $story){
				$_SESSION['story_id'] = $story['story_id'];
?>
<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<div class="post-thumb">
						<img class="img-responsive" src="img/<?=$story['story_image']?>" alt="" width="500px">
					</div>
					<h2 class="post-title"><?=$story['story_title']?></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="fas fa-calendar-day"></i> POSTED BY<?=$story['post_date']?>
							</li>
							<li>
								<i class="fas fa-user-tie"></i>  <?=$story['story_writer']?>
							</li>
							
						</ul>
					</div>
					<div class="post-content post-excerpt">
						<p> <?=$story['main_story']?> </p>
					</div>
							<?php } ?>
						</div>
						
						
						<h3 class="post-sub-heading">Comments</h3>
						<?php
						$activeStoryId = $story['story_id'];
						$sql = "SELECT * FROM `comments` WHERE `post_id`= '$activeStoryId'";
						$commentResult = $conn->query($sql);	
		
						foreach($commentResult as $cmnt){?>
						<div class="cmnt_sec">
							<h6><i class="fas fa-user-tie" style="margin-right:5px;"></i><?php echo $cmnt['Name'];?></h6>
							<p><?php echo $cmnt['comments'];?></p>
						</div>
						
		<?php }?>		
			
			
			


					
				
						<div class="post-comments-form">
								<h3 class="post-sub-heading">Leave You Comments</h3>
								<form method="post" action="comment.php" id="form" role="form" >
							
									<div class="row">
										<!-- Comment -->
										<div class="form-group col-md-12">
											<input type="hidden" name="story_id" value="<?=$story['story_id']?>">
											<textarea name="comment" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
										</div>

										<!-- Send Button -->
										<div class="form-group col-md-12">
											<button type="submit" name="btn_Comment" class="btn btn-small btn-main ">
												Send comment
											</button>
										</div>


									</div>

								</form>
							</div>
							

			</div>
		</div>
	</div>
</section>
<?php include_once 'template/footer.php';?>