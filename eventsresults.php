<!DOCTYPE html>
<html>
	
	<head>
		<title>Events</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	<head>
	<?php include 'php/dbconn.php';?>
	
	<body>
	
		<div id="in-head-of-page">
			Events Page
		</div>
			
		<nav id="in-nav">
			<ul>
				<li><a href="index.php"><span>Home</span></a></li>
				<li><a href="about.php"><span>About</span></a></li>
				<li><a href="events.php"><span id="nav-selected-page-decor">Events</span></a></li>
				<li><a href="contact.php"><span>Contact</span></a></li>
			</ul>
		</nav>
		
		<div id="in-main-part-of-page">
		
			
			
			<?php  
			
				
				//Using GET
				$data_location = $_GET['getdatafrom'];
				$timezone = $_GET['whattimezonetouse'];
				
				switch($data_location){
					case'sql':{
						include "php/geteventstablesql.php";
						echo getDataFromSQL($timezone);
						break;
					}
					case'api':{
						include "php/geteventstableapi.php";
						echo getDataFromAPI($timezone);
						break;
						
					}
				}
				 
				
				
				
				
			 ?>
		</div>
		
		<footer id="in-footer">
			copyright 
		</footer>
		
	</body>
	
</html>