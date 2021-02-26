<?php include_once 'template/head.php'?>
<?php include_once 'template/nav.php'?>
<?php include_once 'databaseConnect.php';

		$id=$_GET['bookid'];
			$conn=connect();
	
			$sql = "SELECT * FROM books WHERE bookID=$id";
			$book_blurb = $conn->query($sql);
			foreach ($book_blurb as $bookbl){
?>

<div class="row">
	<div class="col-md-12 mt-20 text-center" id="bd1"><h4>Book Details</h4></div>
</div>
<div class="container">
<div class="row">
<div class= "col-md-5">
	 <img src="img/<?=$bookbl['book_image']?>" alt="New York">
</div>
<div class= "col-md-7">
	<h2><?=$bookbl['bookName']?></h2>
	<p class="product-price">by <?=$bookbl['authorName']?></p>
	<p class="product-price">$<?=$bookbl['price']?></p>
	<p class="product-description mt-20">
		<?=$bookbl['blurb']?>
	</p>
	
	
	


</div>
			<?php } ?>
</div>
</div>

<?php include_once 'template/footer.php';?>

