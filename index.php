<?php include_once 'template/head.php';?>
<?php include_once 'template/nav.php';?>


<div id="slides" class="carousel slide" data-ride="carousel">

 
  <ul class="carousel-indicators">
    <li data-target="#slides" data-slide-to="0" class="active"></li>
    <li data-target="#slides" data-slide-to="1"></li>
    <li data-target="#slides" data-slide-to="2"></li>
  </ul>


  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carosal_one.png" alt="carosal">
	   <div class="carousel-caption">
        <h1 class="display-2">Buy Your Favorite Book Now!</h1>
        <button class="btn carosal_btn"><a href="books.php"><h4>Buy Book!</h4></a></button>
      </div>
    </div>
	
    <div class="carousel-item">
      <img src="img/carosal_two.png" alt="carosal">
	   <div class="carousel-caption">
        <h1 class="display-2">Wants to be Our Member?</h1>
		<?php if(!isset($_SESSION['loggedin'])){ ?>
        <button class="btn carosal_btn"><a href="signupForm.php"><h4>Sign Up</a></h4></button>
		<?php } ?>
      </div>
    </div>
	
    <div class="carousel-item">
      <img src="img/carosal_three.png" alt="carosal">
	   <div class="carousel-caption">
        <h1 class="display-2">Wants to Read Story of New Writer??</h1>
		<?php if(isset($_SESSION['loggedin'])){ ?>
        <button class="btn carosal_btn"><a href="show_story.php"><h4>Read Story</h4></a></button>
		<?php }else{ ?>
			<button class="btn carosal_btn"><a href="signupForm.php"><h4>Read Story</h4></a></button>
		<?php } ?>
      </div>
    </div>
  </div>

	  
	  <a class="carousel-control-prev" href="#slides" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#slides" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>

</div>

	<div class="container text-center" id="search_area">
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 search_btn" >
	<h4> Search Here with Book Name Or Author Name </h4>
		<form class="search"   action= "search.php" method="POST">
		  <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
        <div class="searchbar" >
          <input class="search_input" type="text" name="bsearch"  placeholder="Search...">
          <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
        </div>
		
		</div>
		</div>
	</form>
	</div>
	<div class="col-md-3"></div>
	</div>
	</div>
	
	<div class="container-fluid padding">
	<div class="row welcome text-center"  id="sec1">
	
		<div class="col-md-12">
			<h1 class="display-12">Welcome <span>to</span> Bookish</h1>
			
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<p class="lead">A welcome note is a written script that is usually used in events like birthday party, 
			wedding, and business meetings. It is a combination of play on 
			words and intrinsic details.</P>
		</div>
		<div class="col-md-2"></div>
	</div>
	</div>
	
		<div class="container">
	 <div class="row">
		<div class="col-md-12 text-center" >
			<h1 class="display-12">Trending</h1><hr>
		<?php
			include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM books LIMIT 4";
			$conn->query($sql);
			$result = $conn->query($sql);
			
			foreach($result as $ubooks){
				
			
			
		
		?>
		</div>
		  <div class="col-lg-3 col-md-3 mb-4">
				 <div class="card" style="width:200px">
					<img class="card-img-top" src="img/<?=$ubooks['book_image']?>" alt="Card image" style="width:100%">
					<div class="card-body">
					  <h6 class="card-title">Books Title : <?=$ubooks['bookName']?></h6>
					  <p class="card-text">By <?=$ubooks['authorName']?></p>
				</div>
			</div>
			<?php } ?>
			</div>
			
			
			
		
    </div>
	</div>
	
	<div class="container-fluid" id="sec2">
	<div class="row text-center">
		<div class="col-md-12 ">
			<h1 class="display-12">Why Us?</h1>
		</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-cart-plus fa-2x"></i>
		<h3>SAFE SHOPPING</h3>
		<p>Safe Shopping Guarantee</p>
	</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-hand-holding-usd fa-2x"></i>
		<h3>30- DAY RETURN</h3>
		<p>Moneyback guarantee</p>
	</div>
	<div class= "col-xs-12 col-sm-6 col-md-4">
		<i class="fas fa-truck fa-2x"></i>
		<h3>FREE SHIPPING</h3>
		<p>On oder over $100</p>
	</div>
	</div>
	</div>
	
	
	<div class="container">
	 <div class="row">
		<div class="col-md-12 text-center">
			<h1 class="display-12">Upcoming Books</h1><hr>
			<?php
			include_once 'databaseConnect.php';
			$conn=connect();
	
			$sql = "SELECT * FROM upcoming_book LIMIT 4";
			$conn->query($sql);
			$result = $conn->query($sql);
			
			foreach($result as $upbooks){
				
			
			
		
		?>
			
		</div>
		  <div class="col-lg-3 col-md-3 mb-4">
				 <div class="card" style="width:200px">
					<img class="card-img-top" src="img/<?=$upbooks['ubook_image']?>" alt="Card image" style="width:100%">
					<div class="card-body">
					  <h6 class="card-title">Books Title: <?=$upbooks['ubook_name']?></h6>
					  <p class="card-text">By <?=$upbooks['ubook_author']?></p>
				</div>
			</div>
			<?php } ?>
			</div>
		
    </div>
	</div>
	
	<!----quotes---->
	<div class="col-md-12 text-center">
			<h4 class="display-12">"Quotes"</h4>	
	</div>
<div id="quotes" class="carousel slide" data-ride="carousel">

	
	
	
	<div class="container" id="quotes_body">
		<div class="row text-center">
		
		    <div class="carousel-inner">
				<div class="carousel-item active">
				   <div class="mySlides">
					<q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
					<p class="author">- John Keats</p>
				</div>
				  </div>
				
				<div class="carousel-item">
					<div class="mySlides">
						<q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
						<p class="author">- Ernest Hemingway</p>
					</div>
				</div>
				<div class="carousel-item">
				  <div class="mySlides">
					<q>I have not failed. I've just found 10,000 ways that won't work.</q>
					<p class="author">- Thomas A. Edison</p>
				</div>
				</div>
			</div>
		</div>
	</div>
	 <a class="carousel-control-prev" href="#quotes" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#quotes" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>
</div>


 

	  
	 



<!----End quotes---->
	
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up" fa-2x></i></button>
	<script>
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("myBtn").style.display = "block";
		  } else {
			document.getElementById("myBtn").style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}
	
	</script>
	<?php include_once 'template/footer.php';?>
	
	