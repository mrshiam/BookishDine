<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbName = 'bookishdine';
	
	$con = new mysqli($host,$user,$pass);
	
	$sql = "CREATE DATABASE $dbName";
	$con->query($sql);
	
	$con = new mysqli($host,$user,$pass,$dbName);

		
		//for books Table.......................
	$sql = 'CREATE TABLE `books` (
	`bookID` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`bookName` varchar(30) NOT NULL,
	`authorName` varchar(50) NOT NULL,
	`price` int(20) NOT NULL,
	`blurb` varchar(255) NOT NULL,
	`quantity` int(30) NOT NULL,
	`book_image` varchar(255) NOT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;		
	';
	if($con->query($sql)){
		echo 'Table books created Successfully<br>';
	}
	
		//for customer Table.......................
	$sql = "CREATE TABLE `customer` (
	`Customer_Id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`FirstName` varchar(50) NOT NULL,
	`LastName` varchar(50) NOT NULL,
	`UserName` varchar(50) NOT NULL,
	`Email` varchar(50) NOT NULL,
	`Password` varchar(20) NOT NULL,
	`userRole` INT(1) NOT NULL COMMENT '1=Admin,0=User'
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	";
	if($con->query($sql)){
		echo 'Table customer created Successfully<br>';
	}
	$sql="INSERT INTO customer (FirstName,LastName,	UserName,Email,	Password,userRole)
		VALUES ('Admin','Panel','AdminPanel','adminpanel@gmail.com','123','1')";
	if($con->query($sql)){
		echo 'Admin created successfully<br>';
	}
	
	
	
	//for story Table.......................
	$sql = 'CREATE TABLE `story` (
	`story_id` int(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`story_title` varchar(100) NOT NULL ,
	`story_writer` varchar(100) NOT NULL,
	`post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`main_story` varchar(255) NOT NULL,
	`story_image` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	';
	if($con->query($sql)){
		echo 'Table story created Successfully<br>';
	}
	
  $sql ='CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Customer_Id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `comments_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` varchar(255) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	';
	if($con->query($sql)){
		echo 'Table comments created Successfully<br>';
	}
	
	
	
	
	
	$sql ='CREATE TABLE `upcoming_book` (
	`ubook_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`ubook_name` varchar(50) NOT NULL,
	`ubook_author` varchar(50) NOT NULL,
	`ubook_image` varchar(255) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	';
	if($con->query($sql)){
		echo 'Table Upcoming Books created Successfully<br>';
	}
	
	$sql ='CREATE TABLE `customer_order` (
	  `order_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `customer_name` varchar(30) NOT NULL,
	  `customer_addres` varchar(100) NOT NULL,
	  `zip_code` int(10) NOT NULL,
	  `city` varchar(20) NOT NULL,
	  `dateof_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  `total_amount` int(20) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	';
	if($con->query($sql)){
		echo 'Table Customer Order created Successfully<br>';
	}
	
	$sql ='CREATE TABLE `customer_orderdetails` (
	  `order_details_id` int(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `order_id` int(20) NOT NULL,
	  `book_id` int(20) NOT NULL,
	  `price` int(30) NOT NULL,
	  `quantity` int(10) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	';
	if($con->query($sql)){
		echo 'Table Customer Order Details created Successfully<br>';
	}
	
	$sql="INSERT INTO `books` (`bookID`, `bookName`, `authorName`, `price`, `blurb`, `quantity`, `book_image`) VALUES
	(1, 'Still Me', 'Jojo Moyes', 180, 'Louisa Clark arrived in New York from England. She began working as Agnes GopnikÃ¢â‚¬â„¢s assistant. The Gopniks were a wealthy family that lived in the Lavery hotel. Louisa lived in the staff quarters of the GopniksÃ¢â‚¬â„¢ apartment with her friend Nath', 20, 'stillme.jpg'),
	(2, 'The Outsider', 'Stephen King', 180, 'In The Outsider by Stephen King, Detective Ralph Anderson was stumped when physical evidence placed a suspect for the brutal murder of a child in two different places at one time. Taught to follow the physical evidence, Ralph encountered amateur detective', 20, 'theoutsider.jpg'),
	(3, 'The Great Alone', 'Kristin Hannah', 170, 'In 1974, 13-year-old Leni tiptoes around her moody father, Ernt, a veteran who returned scarred and traumatized from Vietnam. When Ernt loses his latest job, he decides to move the family from Seattle to a property in Alaska that he inherited from his war', 20, 'thegreateralone.jpg'),
	(4, 'The Hate U Give', 'Angie Thomas', 190, 'Starr Carter is socializing at a party in her neighborhood, Garden Heights, when she runs into Khalil Harris, an old friend from childhood she has not seen in a while. As they catch up, a gun fight breaks out and they flee the party. ', 20, 'thehate.jpg'),
	(5, 'Vengeful', 'V.E. Schwab', 120, 'Set in an unnamed independent African country, \"Vengeful Creditor\" opens as Mrs. Emenike, an educated and well-to-do African woman, is checking out of the supermarket. She is irritated at the decline in the standards of service in the store ever since the', 20, 'Vengeful.jpg'),
	(6, 'Educated', 'Tara Westover', 180, 'The memoir opened with Tara reflecting on the mountainous land on which she grew up and the way her childhood was influenced from such isolation from society. Grandma-down-the-hill offered to take Tara to a school in Arizona, but she refused to leave her ', 20, 'educated.jpg')";

	if($con->query($sql)){
		echo 'Book Inserted Successfully<br>';
	}
	
	$sql = "INSERT INTO `story` (`story_id`, `story_title`, `story_writer`, `post_date`, `main_story`, `story_image`) VALUES
	(1, 'A serious case', 'Chris Rosce', '2019-04-25 03:24:09', 'I have a friend who is afraid of spiders. This is not very unusual. a lot of people are afraid of spiders. I do not really like spiders much myself. I do not mind them if I see them outside in the garden, as long as they are not too big. But if one comes ', 'spider.jpg'),
	(2, 'Discover You', 'Dan Look', '2019-04-26 10:57:16', 'Then the doctor told her to go home and come back the next day. The next day she went back and the plastic spider was on her chair. She had to move the spider so she could sit down. The next day she held the spider in her hand while she sat in her chair. ', 'pexels-photo-373465.jpeg')";
	if($con->query($sql)){
		echo 'Story Inserted Successfully<br>';
	}
	
	$sql = "INSERT INTO `upcoming_book` (`ubook_id`, `ubook_name`, `ubook_author`, `ubook_image`) VALUES
	(3, 'Wayward Son', 'Rainbow Rowell', '44034303.jpg'),
	(4, 'Romanov', 'Nadine Brandes', '40590407.jpg'),
	(5, 'Ninth House', 'Leigh Bardugo', '43263680.jpg'),
	(6, 'Chain of Gold', 'Cassandra Clare', '17699853.jpg')";
	if($con->query($sql)){
		echo 'Upcoming Book Inserted Successfully<br>';
	}
?>