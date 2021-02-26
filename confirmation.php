<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<?php 
	if(isset($_GET['oid'])){
		$orderId = $_GET['oid'];
		include_once 'databaseConnect.php';
		$conn=connect();
		
		$sql = "SELECT * FROM customer_order
				JOIN customer_orderdetails ON customer_orderdetails.order_id = customer_order.order_id
				JOIN books ON books.bookID = customer_orderdetails.book_id
				WHERE customer_order.order_id = $orderId";
			
		$result = $conn->query($sql);
		
	}




?>
<div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-12">
        <div class="block text-center"style="margin-top: 40px;">
        	<i class="far fa-check-circle fa-5x"></i>
          <h2 class="text-center">Thank you! For your payment</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, sed.</p>
          <a href="books.php" class="btn btn-main mt-20">Continue Shopping</a>
        </div>
      </div>
    </div>
	
	
	
	<div class="row">
		<div class="col-md-12">
		    <h3>Order Details</h3>
			<div>
				<table class="table table-hover">
				
					<tr>
						<th class="th-lg">Customer Name</th>
						<th class="th-lg">Customer Address</th>
						<th class="th-lg">Book Name</th>
						<th class="th-lg">Total</th>
						
					</tr>
				<?php foreach($result AS $items){ ?>
					<tr>
						<td><?php echo $items["customer_name"]; ?></td>
						<td><?php echo $items["customer_addres"]; ?></td>
						<td> <?php echo $items["bookName"]; ?></td>
						<td> <?php echo $items["total_amount"];?></td>
					</tr>
				<?php }	?>
				</table>
			</div>
		</div>
	</div>
  
  
  

  
</div>
<div class="row">
	<div class="col-md-12">
		<?php include_once 'template/footer.php';?>
	</div>
	</div>