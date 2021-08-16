<?php
function connect(){
	$host='localhost';
	$user='root';
	$pass='';
	$database='bookishdine';
	
	
	$con = new mysqli($host,$user,$pass,$database);
	return $con;
	
	if($con->connect_error){
		die("connection failed:" .$con->connect_error);
	}
	else{
		echo "Connected";
	}
	}

	
?>
