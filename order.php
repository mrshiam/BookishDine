<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php if(!isset($_SESSION['loggedin'])&& $_SESSION['userRole'] !=1 ){
	header('location:signinForm.php');
}?>

<?php 

	
		include_once 'databaseConnect.php';
		$conn=connect();
		
		$sql = "SELECT * FROM customer_order
				JOIN customer_orderdetails ON customer_orderdetails.order_id = customer_order.order_id
				JOIN books ON books.bookID = customer_orderdetails.book_id";
			
		$result = $conn->query($sql);
		
	



?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="title_head text-center" >Order Details</h3>

			<div>
				<table class="table table-hover">
					
						<tr>
							<th class="th-lg">Order ID</th>
							<th class="th-lg">Customer Name</th>
							<th class="th-lg">Order Date</th>
							<th class="th-lg">Customer Address</th>
							<th class="th-lg">Book Name</th>
							<th class="th-lg">Book Price</th>
							
						</tr>
					<?php foreach($result AS $items){ ?>
						<tr>
							<td><?php echo $items["order_id"]; ?></td>
							<td><?php echo $items["customer_name"]; ?></td>
							<td><?php echo $items["dateof_order"]; ?></td>
							<td><?php echo $items["customer_addres"]; ?></td>
							<td> <?php echo $items["bookName"]; ?></td>
							<td> <?php echo $items["price"];?></td>
						</tr>
					<?php }	?>
				</table>
			</div>
		</div>
	</div>

</div>