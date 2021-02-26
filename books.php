<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>

<?php

	//To retriving cart data ............................................................................................
	$count=0;
	if(isset($_POST["addtocart"])){
	if(isset($_SESSION["books_cart"]))
	{
		$books_arrayid = array_column($_SESSION["books_cart"], "bookID");
		if(!in_array($_GET["id"], $books_arrayid))
		{
			$count = count($_SESSION["books_cart"]);
			//$_SESSION['item'] = $count;
			$book_array = array(
				'bookID'		   	=>	$_GET["id"],
				'bookName'			=>	$_POST["bookName"],
				'authorName'		=>	$_POST["authorName"],
				'price'			  	=>	$_POST["price"],
				'quantity'		 	=>	$_POST["quantity"]
			);
			$_SESSION["books_cart"][$count] = $book_array;
		}
		else
		{
			//echo '<script>alert("Item Already Added")</script>';  
                //echo '<script>window.location="bookscart.php"</script>'; 
				for ($bid = 0; $bid<count($books_arrayid); $bid++){
						if ($books_arrayid[$bid] == $_GET["id"]){
							$_SESSION['books_cart'][$bid]['quantity'] += $_POST["quantity"];
							}
						} 
		}
	}
	else
	{
		$book_array = array(
			'bookID'		  	=>	$_GET["id"],
			'bookName'			=>	$_POST["bookName"],
			'authorName'		=>	$_POST["authorName"],
			'price'				=>	$_POST["price"],
			'quantity'			=>	$_POST["quantity"]
		);
		$_SESSION["books_cart"][0] = $book_array;
	}
}



if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["books_cart"] as $keys => $values)
		{
			if($values["bookID"] == $_GET["id"])
			{
				unset($_SESSION["books_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				header('location:bookscart.php');
			}
		}
	}
}

//.....................................................................................................................

?>


	<div class="container">
		<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="widget-title">Bookish Collection</h1>
			
		</div>

		<?php
			include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM books";
			$output = $conn->query($sql);
			foreach($output AS $row){
		
		?>
			<div class="col-lg-4 col-md-6 mb-4">
				<form method="post" action="books.php?action=add&id=<?php echo $row['bookID'];?>">
						<div class="card" style="width:300px">
								<img class="card-img-top" style= "Height: 400px; "src="img/<?=$row['book_image']?>" alt="Card image" style="width:100%">
									<div class="card-body">

										<h4 class="card-title">Books Title:<?=$row['bookName']?></h4>

											<p class="card-text">by <?=$row['authorName']?></p>
											<p class="card-text">Price:$<?=$row['price']?></p>
											<p class="card-text"><?=$row['blurb']?></p>

											<input type="text" name="quantity" class="form-control" value="1"/>
											<input type="hidden" name="bookName"  value="<?=$row['bookName']?>"/>
											<input type="hidden" name="authorName"  value="<?=$row['authorName']?>"/>
											<input type="hidden" name="price"  value="<?=$row['price']?>"/>

											<input type="submit" name="addtocart" class="btn" value="Add To Cart"/>

											<a href="bookdetails.php?bookid=<?=$row['bookID']?>" class="btn"><i class="fas fa-info-circle" style="margin-right: 5px";></i>Books Blurb</a>
									</div>	
						</div>
				</form>
			</div>
			
		<?php } ?>










		</div>
		
		</div>
		
		
		
		
		
		
		
		
		
  
 <?php include_once 'template/footer.php';?>