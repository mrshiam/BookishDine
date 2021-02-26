
<?php
	session_start();
	$b_name = $_POST['b_name'];
	$a_name = $_POST['a_name'];
	$b_price = $_POST['b_price'];
	$b_quan = $_POST['b_quan'];
	$b_blurb = $_POST['b_blurb'];
	
	
	if($b_name == ''){
			header('location:book_entryForm.php?msg=Please type Book Name');exit;
		}
	if($a_name == ''){
			header('location:book_entryForm.php?msg=Please type  Author Name');exit;
		}
	if($b_price == ''){;
			header('location:book_entryForm.php?msg=Please Enter  Price');exit;
		}
	if($b_quan == ''){
			$_SESSION['msg'] = 'Please Enter  Quantity';
			header('location:book_entryForm.php?msg=Please Enter  Quantity');exit;
		}
	if($b_blurb == ''){
			header('location:book_entryForm.php?msg=Please type  Blurb');exit;
		}
	
	
	
	
	
	//File Upload
	
	$target_dir = "img/";
	$fileName= basename($_FILES["imagefileUpload"]["name"]);
	$target_file = $target_dir . $fileName;
	
	$uploadOk = 1; //Flag 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["imagefileUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			header('location:book_entryForm.php?msg=File is not an image');
			$uploadOk = 0;
			
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		header('location:book_entryForm.php?msg=Sorry, file already exists');
			$uploadOk = 0;
			
	}
	// Check file size
	if ($_FILES["imagefileUpload"]["size"] > 500000) {
		header('location:book_entryForm.php?msg=Sorry, your file is too large');
			$uploadOk = 0;
			
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		header('location:book_entryForm.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed');
			$uploadOk = 0;
			
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		header('location:book_entryForm.php?msg=Sorry, your file was not uploaded');
			
		
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["imagefileUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["imagefileUpload"]["name"]). " has been uploaded.";
			
		} else {
			header('location:book_entryForm.php?msg=Sorry, there was an error uploading your file');
		}
	}
	
	
	
	//---End of File Upload

	
	
	include_once 'databaseConnect.php';
	
	 $conn=connect();

	
	$sql = "INSERT INTO books(bookName,authorName,price,quantity,blurb,book_image)
			VALUES ('$b_name','$a_name','$b_price','$b_quan','$b_blurb','$fileName')";
	
	if($conn->query($sql)){
	header('location:book_entryForm.php?msg=Added successfully');
	}
	else{
	header('location:book_entryForm.php?msg=Not Added successfully');
	}
	
	?>