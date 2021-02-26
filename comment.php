	<?php 
		session_start();
		include_once 'databaseConnect.php';
		$conn=connect();
						if(isset($_POST['btn_Comment'])){
						$cmnt = $_POST['comment'];
						$C_userId = $_SESSION['Customer_Id'];
						$C_username = $_SESSION['userName'];
						$activeStoryId = $_SESSION['story_id'];
				
						$sql = "INSERT INTO `comments`( `Customer_Id`, `post_id`, `comments`,`Name`) 
						VALUES ('$C_userId','$activeStoryId','$cmnt','$C_username')";
						$conn->query($sql);	
						header('location:single_story.php?storyid='.$activeStoryId);
						
			}?>