<?php
	session_start();
	$fName= $_POST['fName'];
	$lName= $_POST['lName'];
	$uName= $_POST['uName'];
	$eMail= $_POST['eMail'];
	$passWord= $_POST['passWord'];
	$userRole= $_POST['userRole'];
	
	
	if($fName == ''){
		header('location:signupForm.php?msg=Please type First Name');exit;
	}
	
	if($lName == ''){
			header('location:signupForm.php?msg=Please type Last Name');exit;
		}
	
	if($uName == ''){
			header('location:signupForm.php?msg=Please type User Name');exit;
		}
		
	if($eMail == ''){
			$_SESSION['msg'] = 'Please type Email';
			header('location:signupForm.php?msg=Please type Email');exit;
		}
	if($passWord == ''){
			header('location:signupForm.php?msg=Please type Password');exit;
			
		} 
	
	include_once 'databaseConnect.php';
	$conn=connect();
	

	
	$sql = "SELECT * FROM customer WHERE Email = '$eMail' OR UserName = '$uName'";
	$output = $conn->query($sql);
	
	
	if($output->num_rows>0){
		header('location:signupForm.php?msg=User Already Exists!');
		exit;
	}
	else{
	
	
	
	 $sql = "INSERT INTO customer(FirstName,LastName,UserName,Email,Password,userRole) 
			VALUES ('$fName','$lName','$uName','$eMail','$passWord','$userRole')";
	
	$conn->query($sql);
	header('location:signinForm.php?msg= Registered Successfully');
	
	}

?>