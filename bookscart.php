<?php include_once 'template/head.php' ?>
<?php include_once 'template/nav.php';?>
<?php

//include_once 'databaseConnect.php';
//$conn=connect();



	//To retriving cart data .............................
?>
<div class="container">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  
     <h3>Order Details</h3>
			<div>
				<table class="table table-hover table-fixed" style="height: 400px;">
				
					<tr>
						<th class="th-lg">Book Name</th>
						<th class="th-lg">Author Name</th>
						<th class="th-lg">Quantity</th>
						<th class="th-lg">Price</th>
						<th class="th-lg">Total</th>
						<th class="th-lg">Action</th>
					</tr>
				

		 <?php
			
				
					
				if(isset($_SESSION["books_cart"]) && !empty($_SESSION["books_cart"]))
					{
						$total = 0;
						foreach($_SESSION["books_cart"] as $keys => $values)
					    { 
				?>

					<tr>
						<td><?php echo $values["bookName"]; ?></td>
						<td><?php echo $values["authorName"]; ?></td>
						<td> <?php echo $values["quantity"]; ?></td>
						<td>$ <?php echo $values["price"]; ?></td>
						<td> <?php echo number_format($values["quantity"] * $values["price"], 2);?></td>
						<td><a href="books.php?action=delete&id=<?php echo $values["bookID"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["quantity"] * $values["price"]);
						
					}?>
						<tr>
							<td colspan="5" align="right">Total</td>
							<td align="right">$ <?php echo number_format($total, 2); ?></td>
							<td></td>
					</tr>
				<?php
					}
				?>
						
				</table>
			</div>
			</div>
			<div class="col-md-2"></div>
			</div>
			
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 col-md-offset-2">
			<div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
					 <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>
                  <form class="checkout-form" method="POST" action="checkout.php">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" name="customer_address" placeholder="">
                     </div>
                     <div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" name="customer_post_code" name="zipcode" >
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" name="customer_city" name="city">
                           <input type="hidden" class="form-control" name="total_amount" name="total" value="<?=$total?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btn" name="btn_checkout" value="Checkout">
                     </div>
                  </form>
               </div>
              </div>
			  <div class="col-md-2"></div>
			 </div>
			 </div>
			 <?php include_once 'template/footer.php';?>
			
			





			



			
