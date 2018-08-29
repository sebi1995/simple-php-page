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
		
			
			<form method="get" action="eventsresults.php">
				Data location: 
				<select name="getdatafrom">
					<option value="sql">MySQL</option>
					<option value="api">API</option>
				</select>
				</br>
				Timezone: 
				<select name="whattimezonetouse">
					<option value="local">Local</option>
					<option value="utc">UTC</option>
				</select>
				<input type="submit" value="get res" />
			</form>
			 
		
		</div>
		
		<footer id="in-footer">
			copyright 
		</footer>
		
	</body>
	
</html>