<?php
	session_start();
	$eMail=$_POST['eMail'];
	$passWord=$_POST['passWord'];
	
	
	if($eMail == ''){
			header('location:signinForm.php?msg=Please type  Valid Email');exit;
		}
	
	if($passWord == ''){
			header('location:signinForm.php?msg=Please type  Password');exit;
		}
	
	include_once 'databaseConnect.php';
	$conn=connect();
	
	$sql = "SELECT * FROM customer WHERE Email = '$eMail' AND Password = '$passWord'";
	$output = $conn->query($sql);
	
	if($output->num_rows>0){
		foreach($output AS $row){
			$_SESSION['Customer_Id']=$row['Customer_Id'];
			$_SESSION['userRole'] = $row['userRole'];
			$_SESSION['userName'] = $row['UserName'];
			}
		$_SESSION['loggedin'] = true;
		header('location:index.php?msg=Loggedin successfully');
	}
	else{
		
		header('location:signinForm.php?msg=Your Email or Password is Wrong');
	}

?>