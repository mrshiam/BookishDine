<?php
	session_start();
	$ubook_name = $_POST['ubook_name'];
	$uauthor_name = $_POST['uauthor_name'];
	
	
	if($ubook_name == ''){
		header('location:upcoming_bookForm.php?msg=Please type Book Name');exit;
	}
	
	if($uauthor_name == ''){
		$_SESSION['msg'] = 'Please type Author Name';
		header('location:upcoming_bookForm.php?msg=Please type Author Name');exit;
	}
	
	
	//File Upload
	
	$target_dir = "img/";
	$upcomingbookfile= basename($_FILES["ubook_imagefileUpload"]["name"]);
	$target_file = $target_dir . $upcomingbookfile;
	
	$uploadOk = 1; //Flag 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	$_SESSION['msg']='';
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["ubook_imagefileUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			header('location:upcoming_bookForm.php?msg=File is not an image');
			$uploadOk = 0;
			
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		header('location:upcoming_bookForm.php?msg=Sorry, file already exists');
			$uploadOk = 0;
			
	}
	// Check file size
	if ($_FILES["ubook_imagefileUpload"]["size"] > 500000) {
		header('location:upcoming_bookForm.php?msg=Sorry, your file is too large');
			$uploadOk = 0;
			
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		header('location:upcoming_bookForm.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed');
			$uploadOk = 0;
			
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		header('location:upcoming_bookForm.php?msg=Sorry, your file was not uploaded');
			
		
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["ubook_imagefileUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["ubook_imagefileUpload"]["name"]). " has been uploaded.";
			//$upcomingbookfile=basename($_FILES["imagefileUpload"]["name"]);
		} else {
			header('location:upcoming_bookForm.php?msg=Sorry, there was an error uploading your file');
		}
	}
	
	
	
	//---End of File Upload

	
	
	include_once 'databaseConnect.php';
	
	 $conn=connect();

	
	$sql = "INSERT INTO upcoming_book(ubook_name,ubook_author,ubook_image)
			VALUES ('$ubook_name','$uauthor_name','$upcomingbookfile')";
	
	if($conn->query($sql)){
	header('location:upcoming_bookForm.php?msg=Added Successfully');
	}
	else{
	header('location:upcoming_bookForm.php?msg= Not Added Successfully');
	}
	
	
	?>