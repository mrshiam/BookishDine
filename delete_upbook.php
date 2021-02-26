<?php 
	session_start();
	$id=$_GET['up_ID'];
	
	
	include_once 'databaseConnect.php';
			$conn=connect();
		if (isset($_POST['delete_btn'])){
			$sql = "DELETE FROM upcoming_book WHERE ubook_id = $id";
			
			if ($conn->query($sql)){
				header('location:upcoming_bookForm.php?msg= Deleted Successfully');
			}else{
			header('location:upcoming_bookForm.php?msg=Not Deleted successfully').$conn->error;
			}

		}
?>