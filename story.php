<?php
	session_start();
	$s_titile= $_POST['s_titile'];
	$w_name= $_POST['w_name'];
	$story_body= $_POST['story_body'];
	
	
	
	if($s_titile == ''){
		header('location:post_story.php?msg=Please type Story Title');exit;
	}
	
	if($w_name == ''){
		header('location:post_story.php?msg=Please type Your Name');exit;
	}
	if($w_name == ''){
		header('location:post_story.php?msg=Please type Story');exit;
	}
	
	
	
	
	
	//File Upload
	
	$target_dir = "img/";
	$fileNameStory= basename($_FILES["storyImage"]["name"]);
	$target_file = $target_dir . $fileNameStory;
	
	$uploadOk = 1; //Flag 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["storyImage"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			header('location:post_story.php?msg=File is not an image');
			$uploadOk = 0;
			
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		header('location:post_story.php?msg=Sorry, file already exists');
			$uploadOk = 0;
			
	}
	// Check file size
	if ($_FILES["storyImage"]["size"] > 500000) {
		header('location:post_story.php?msg=Sorry, your file is too large');
			$uploadOk = 0;
			
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		header('location:post_story.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed');
			$uploadOk = 0;
			
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		header('location:post_story.php?msg=Sorry, your file was not uploaded');
			
		
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["storyImage"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["storyImage"]["name"]). " has been uploaded.";
			
		} else {
			header('location:post_story.php?msg=Sorry, there was an error uploading your file');
		}
	}
	
	
	
	//---End of File Upload


	include_once 'databaseConnect.php';
	
	 $conn=connect();

	
	$sql = "INSERT INTO story(story_title,story_writer,main_story,story_image)
			VALUES ('$s_titile','$w_name','$story_body','$fileNameStory')";
		
	if($conn->query($sql)){
	header('location:post_story.php?msg=Added Story Successfully');
	}
	else{
	header('location:post_story.php?msg= Not Added Story Successfully');
	}
	
	
	?>

