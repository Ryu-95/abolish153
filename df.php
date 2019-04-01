<?php

require_once('db_info.php'); /* Get the database information. */
$mysqli = new mysqli(HOST, USER, PASS, DATABASE); /* Connect to the database and store the connection into a variable. */

$query_result_1 = $mysqli->query("SELECT * FROM `Discussion_Q`");
$result = array();

$discussion_array = array();

while($row_1 = mysqli_fetch_array($query_result_1)){
	
	array_push($discussion_array, $row_1);
}

$mysqli->close();

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
<h2>Support Group</h2>

<table>
	<thead>
	<tr>
		<th>Topic</th>
		<th>Submitter</th>
		<th>Date</th>
	</tr>
	</thead>
	<tbody id="tbody1">
	
	</tbody>
<!--	<tr>-->
<!--		<td>Alfreds Futterkiste</td>-->
<!--		<td>Maria Anders</td>-->
<!--		<td>Germany</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>Centro comercial Moctezuma</td>-->
<!--		<td>Francisco Chang</td>-->
<!--		<td>Mexico</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>Ernst Handel</td>-->
<!--		<td>Roland Mendel</td>-->
<!--		<td>Austria</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>Island Trading</td>-->
<!--		<td>Helen Bennett</td>-->
<!--		<td>UK</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>Laughing Bacchus Winecellars</td>-->
<!--		<td>Yoshi Tannamuri</td>-->
<!--		<td>Canada</td>-->
<!--	</tr>-->
<!--	<tr>-->
<!--		<td>Magazzini Alimentari Riuniti</td>-->
<!--		<td>Giovanni Rovelli</td>-->
<!--		<td>Italy</td>-->
<!--	</tr>-->
</table>

</body>

<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	var questions = <?php echo json_encode($discussion_array); ?>;
	// console.log(questions);
	var tbody1 = document.getElementById("tbody1");
	
	for(var i = 0; i < questions.length; i++){
		tbody1.innerHTML += "<tr><td><a href='post.php?id=" + questions[i]['ID'] + "'>" + questions[i]['Title'] + "</a></td><td>" + questions[i]['By_ID'] + "</td><td>" + questions[i]['Date'] + "</td></tr>"
	}
	
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "300px";
	}
	
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>
</html>