<?php include_once 'template/head.php'; ?>
<?php include_once 'template/nav.php';?>
<?php 
	include_once 'databaseConnect.php';
	$conn=connect();
?>
<?php 
	if (isset($_POST['bsearch'])){
		$search_res = $_POST['bsearch'];
			
		 $sql = "SELECT * FROM books
            WHERE (`bookName` LIKE '%$search_res%') OR (`authorName` LIKE '%$search_res%')";
			$output_res = $conn->query($sql);
			
			 if($output_res->num_rows>0){
             
            foreach ($output_res as $search_res){
			
?>
<div class="container">
<div class="row">
<div class= "col-md-5">
	 <img src="img/<?=$search_res['book_image']?>" alt="Book Image">
</div>
<div class= "col-md-7">
	<h2><?=$search_res['bookName']?></h2>
	<p class="product-price">by <?=$search_res['authorName']?></p>
	<p class="product-price">$<?=$search_res['price']?></p>
	<p class="product-description mt-20">
		<?=$search_res['blurb']?>
	</p>
	<div class="product-quantity">
		<span>Quantity:</span>
		<div class="product-quantity-slider">
			<input id="product-quantity" type="text" value="<?=$search_res['quantity']?>" name="product-quantity">
		</div>
	</div>
	
	


</div>
			<?php 
			}
			
			 
				} else{?>
						<section class="page-404 text-center">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<a href="index.php">
											<img src="img/book-and-pen.png" alt="logo" style="width:40px";>
										</a>
										<h1>404</h1>
										<h2>Book Not Found</h2>
										<a href="index.php" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> Go Home</a>
										
									</div>
								</div>
							</div>
						</section> <?php } ?>
			
	<?php } ?>
</div>
</div>
<?php include_once 'template/footer.php';?>
