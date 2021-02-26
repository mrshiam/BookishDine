
<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>
<div class="container">
	<div class="row">
		<?php include_once 'template/side_bar.php';?>
		<div class="col-lg-9">
			<div class="title-image">
			  <img src="img/update_book.jpg" class="img-responsive" alt="Post Story">
			  <div class="title-text"><h1>Update Book</h1></div>
			</div>
			  <?php
			
				if(isset($_GET['msg'])){
					$msg = $_GET['msg'];
					?>
				
		  <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i><?php echo $msg; ?></p>
			
		  <?php } ?>


			<div class="row">
				<?php
					include_once 'databaseConnect.php';
					$conn=connect();
			
					$sql = "SELECT * FROM books";
					$output = $conn->query($sql);
					foreach($output AS $up_book){
					$_SESSION['bookID'] = $up_book['bookID'];
								
				?>
				<div class="col-sm-3 col-md-3">
										
					<div class="card up_card" style="width:200px">
						<form action = "update_bookForm.php?bookid=<?=$up_book['bookID']?>" method="POST">
							<img class="card-img-top" src="img/<?=$up_book['book_image']?>" alt="Card image" style="width:100%">
							<div class="card-body">
							  <h6 class="card-title">Books Title: <?=$up_book['bookName']?> </h6>
							  <p class="card-text">By <?=$up_book['authorName']?></p>
							</div>
							<input type = "submit" class = "btn" value="Update" > </input>
					</form>
					</div>
				</div>
				<?php } ?>
			</div>
				
			
			

  
  
  
  
		</div>
	</div>
</div>
	<?php include_once 'template/footer.php';?>