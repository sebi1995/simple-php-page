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
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="ponds.html">Ponds</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</nav>
		
		<div id="in-main-part-of-page">
			this is the main part where you can put text, shit, videos and pictures. Maps also, if that's what rocks your boat.
			<br/>
			<br/>
			
			<table id="balti-table">
				<tr>
					<td>Id</td>
					<td>Nume</td>
					<td>Locatie</td>
					<td>Capacitate</td>
				</tr>
				<?php 
				include 'php/getbalti.php';
				echo "<br/>";
				echo "<br/>";
				foreach($result as $res){
					echo '<tr>';
					echo  '<td>'.$res['id'].'</td>
							<td>'.$res['nume_balta'].'</td>
							<td>'.$res['locatie_balta'].'</td>
							<td>'.$res['capacitate_balta'].'</td>';
					echo '</tr>';
				}
				
				include 'php/geteventstable.php';
				
			 
			?>
			</table>
			
		</div>
		
		<footer id="in-footer">
			copyright shit
		</footer>
		
	</body>
	
</html>