<?php

require_once('db_info.php'); /* Get the database information. */
$mysqli = new mysqli(HOST, USER, PASS, DATABASE); /* Connect to the database and store the connection into a variable. */

$query_result_1 = $mysqli->query("SELECT * FROM `Case_Q`");
$result = array();

$categories_array = array();

while($row_1 = mysqli_fetch_array($query_result_1)){
	
	$month = date("m",strtotime($row_1['Date']));
	array_push($categories_array, $month);
}

foreach ($categories_array as $item){
	$result["" + $item]++;
}

$mysqli->close();

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Statistics Chart</title>
	<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
	</script>
	<script type = "text/javascript">
		google.charts.load('current', {packages: ['corechart','line']});
	</script>
</head>

<body>
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

<div id = "container" style = "width: 1050px; height: 400px; margin: 0 auto">
</div>
<script language = "JavaScript">
	
	function drawChart() {
		//add data from database
		var array1 = <?php echo json_encode($result); ?>;
		
		for(var i = 1; i < 13; i++){
			if(!array1[''+i]){
				array1[''+i] = 0;
			}
		}
		
		// Define the chart to be drawn.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Month');
		
		data.addColumn('number', 'Reported');
		data.addRows([
			['Jan',   parseInt(array1['1'])],
			['Feb',   parseInt(array1['2'])],
			['Mar',   parseInt(array1['3'])],
			['Apr',   parseInt(array1['4'])],
			['May',   parseInt(array1['5'])],
			['Jun',   parseInt(array1['6'])],
			
			['Jul',   parseInt(array1['7'])],
			['Aug',   parseInt(array1['8'])],
			['Sep',   parseInt(array1['9'])],
			['Oct',   parseInt(array1['10'])],
			['Nov',   parseInt(array1['11'])],
			['Dec',   parseInt(array1['12'])]
		]);
		
		// Set chart options
		var options = {'title' : 'Statistics of Cases Reported',
			hAxis: {
				title: 'Month'
			},
			vAxis: {
				title: 'Number'
			},
			'width':1050,
			'height':400
		};
		
		// Instantiate and draw the chart.
		var chart = new google.visualization.LineChart(document.getElementById('container'));
		chart.draw(data, options);
	}
	google.charts.setOnLoadCallback(drawChart);
</script>
</body>
  <script src="create account_app.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</html>