
<?php
	session_start();
	$upbook_nam = $_POST['upbook_nam'];
	$upauthor_nam = $_POST['upauthor_nam'];
	$upbook_price = $_POST['upbook_price'];
	$upbook_quan = $_POST['upbook_quan'];
	$upbook_blurb = $_POST['upbook_blurb'];
	$activebookid = $_SESSION['bookID'];
	
	
	
	if($upbook_nam == ''){
		header('location:update_bookForm.php?msg=Please type Book Name');exit;
	}
	if($upauthor_nam == ''){
		header('location:update_bookForm.php?msg=Please type  Author Name');exit;
	}
	if($upbook_price == ''){
		header('location:update_bookForm.php?msg=Please Enter  Price');exit;
	}
	if($upbook_quan == ''){
		header('location:update_bookForm.php?msg=Please Enter  Quantity');exit;
	}
	if($upbook_blurb == ''){
		header('location:update_bookForm.php?msg=Please type  Blurb');exit;
	}
	
	
	
	
	//File Upload
	
	$target_dir = "img/";
	$newfileName= basename($_FILES["upimagefileUpload"]["name"]);
	$target_file = $target_dir . $newfileName;
	
	$uploadOk = 1; //Flag 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["upimagefileUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			header('location:update_bookForm.php?msg=File is not an image');
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		header('location:update_bookForm.php?msg=Sorry, file already exists');
			$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["upimagefileUpload"]["size"] > 500000) {
		header('location:update_bookForm.php?msg=Sorry, your file is too large');
			$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		header('location:update_bookForm.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed');
			$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		header('location:update_bookForm.php?msg=Sorry, your file was not uploaded');
		
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["upimagefileUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["upimagefileUpload"]["name"]). " has been uploaded.";
			//$fileName=basename($_FILES["upimagefileUpload"]["name"]);
		} else {
			header('location:update_bookForm.php?msg=Sorry, there was an error uploading your file');
		}
	}
	
	
	
	//---End of File Upload

	
	
	include_once 'databaseConnect.php';
	
	 $conn=connect();

	
	$sql = "UPDATE `books` SET `bookName`='$upbook_nam',`authorName`='$upauthor_nam',`price`='$upbook_price',
			`quantity`='$upbook_quan',`blurb`='$upbook_blurb',`book_image`='$newfileName' WHERE bookID='$activebookid'";
	if($conn->query($sql)){
	header('location:update_books.php?msg=Updated Successfully');exit;
	}
	else{
	header('location:update_books.php?msg= Not Updated Successfully');exit;
	}
	
	?>