<?php
require_once('db_info.php'); /* Get the database information. */
$mysqli = new mysqli(HOST, USER, PASS, DATABASE); /* Connect to the database and store the connection into a variable. */

$query_result_1 = $mysqli->query("SELECT * FROM `Shelter_O`");


$result_array = array();
while($result = mysqli_fetch_array($query_result_1)){
	array_push($result_array, $result);
	
}


?>
<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		
		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		
		tr:nth-child(even) {
			background-color: #dddddd;
		}
	</style>
</head>
<body>
 <img src="logo2.png" alt="" height="25%" width="100%">
<span class="menuB" style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; </span> 
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.html">Home </a>
  <a href="df.php">Discussion Forum</a>
  <a href="Booking.php">Booking a Shelter</a>
  <a href="SAC.php">Submitting a case</a>
  <a href="FAQ.php">FAQ</a>
  <a href="http://abolish153.org/">About Abolish 153</a>
   <a href="http://abolish153.org/contact-us/">Contact Abolish 153</a>
</div>
<h2>Available Shelters</h2>

<table>
	<thead>
	<tr>
		<th>Number</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>For # People</th>
		<th>Location URL</th>
		<th>Address</th>
	</tr>
	</thead>
	<tbody id="tbody1">
	
	</tbody>
	
</table>

</body>

<script src="create account_app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	var tbody = document.getElementById("tbody1");
	var shelters = <?php echo json_encode($result_array); ?>;
	
	for(var i = 0; i < shelters.length; i++){
		tbody.innerHTML += "<tr><td>" + (i+1) + "</td><td>" + shelters[i]['Start_Date'] + "</td><td>" + shelters[i]['End_Date'] + "</td><td>" + shelters[i]['Fits'] + "</td><td><a href='" + shelters[i]['Location_URL'] + "'>Open Map</a></td><td>" + shelters[i]['Location_Text'] + "</td></tr>";
	}
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "300px";
	}
	
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>
</html>