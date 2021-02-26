<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>


<?php
	
	if(isset($_POST['btn_checkout'])){
		$customerName = $_POST['full_name'];	
		$customer_address = $_POST['customer_address'];	
		$customer_post_code = $_POST['customer_post_code'];	
		$customer_city = $_POST['customer_city'];	
		$total_amount = $_POST['total_amount'];	
		
		
		if($customerName == ''){
			header('location:bookscart.php?msg=Please type  Your Name');exit;
		}
		
		if($customer_address == ''){
			header('location:bookscart.php?msg=Please type  Your Full Address');exit;
		}
		
		if($customer_post_code == ''){
			$_SESSION['msg'] = 'Please type  Your Post Code';
			header('location:bookscart.php?msg=Please type  Your Post Code');exit;
		}
		
		if($customer_city == ''){
			header('location:bookscart.php?msg=Please type  City Name');exit;
		}
		
		
		include_once 'databaseConnect.php';
		$conn=connect();
		
		$sql = "INSERT INTO customer_order(customer_name,customer_addres,zip_code,city,total_amount) 
			VALUES ('$customerName','$customer_address','$customer_post_code','$customer_city','$total_amount')";
			
		if($conn->query($sql))
			$orderId = $conn->insert_id;
		
			
	}
	
	if(isset($_SESSION["books_cart"]) && !empty($_SESSION["books_cart"]))
	{
		
		foreach($_SESSION["books_cart"] as $keys => $values)
		{
			$sql = "INSERT INTO customer_orderdetails(order_id,book_id,price,quantity) 
			VALUES('$orderId',".$values['bookID'].",".$values['price'].",".$values['quantity'].")";
			$conn->query($sql);
			
		}
		unset($_SESSION["books_cart"]);
	}
	header('location:confirmation.php?oid='.$orderId);
	
	
	
	

?>
