<!DOCTYPE html>
<html>
	
	<head>
		<title>pagina simpla</title>
		<link rel="stylesheet" href="css/stylesheet.css">
	<head>
	<?php include 'php/dbconn.php';?>
	
	<body>
	
		<div id="in-head-of-page">
			Home Page
		</div>
			
		<nav id="in-nav">
			<ul>
				<li><a href="index.php"><span id="nav-selected-page-decor">Home</span></a></li>
				<li><a href="about.php"><span>About</span></a></li>
				<li><a href="events.php"><span>Events</span></a></li>
				<li><a href="contact.php"><span>Contact</span></a></li>
			</ul>
		</nav>
		
		<div id="in-main-part-of-page">
			test				
		</div>
		
		<footer id="in-footer">
			copyright  
		</footer>
		
	</body>
	
</html>