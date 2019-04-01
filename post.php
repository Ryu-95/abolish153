<?php
require_once('db_info.php'); /* Get the database information. */
$mysqli = new mysqli(HOST, USER, PASS, DATABASE); /* Connect to the database and store the connection into a variable. */

$query_result_1 = $mysqli->query("SELECT * FROM `Discussion_Q` WHERE ID=".$_GET['id']." ");

$result = mysqli_fetch_array($query_result_1);

$query_result_2 = $mysqli->query("SELECT * FROM `Discussion_A` WHERE Post_ID=".$_GET['id']." ");

$result_array = array();
while($result_2 = mysqli_fetch_array($query_result_2)){
	$count2 = $mysqli->query("SELECT COUNT(*) FROM `Discussion_A` WHERE Post_ID=".$_GET['id']." ");
	$count = mysqli_fetch_array($count2);
	
	$name_query = $mysqli->query("SELECT `Name` FROM `Users` WHERE `ID`=".$result_2['By_ID']." ");
	$name_result = mysqli_fetch_array($name_query);
	$result_2['By_ID'] = $name_result['Name'];
	array_push($result_array, $result_2);
	
}


?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="style.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
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

<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">
	
	<!-- Header -->
	<header class="w3-container w3-center w3-padding-32">
		<h1><b>Support Group</b></h1>
	</header>
	
	<!-- Grid -->
	<div class="w3-row">
		
		<!-- Blog entries -->
		<div class="w3-col l8 s12">
			<!-- Blog entry -->
			<div class="w3-card-4 w3-margin w3-white">
				
				<div class="w3-container">
					<h3><b><?php echo $result['Title']; ?></b></h3>
					<h5><span class="w3-opacity"><?php echo $result['Date']; ?></span></h5>
				</div>
				
				<div class="w3-container">
					<p><?php echo $result['Detail']; ?></p>
					<div class="w3-row">
						<div class="w3-col m8 s12">
						</div>
						<div class="w3-col m4 w3-hide-small">
							<p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag"><?php echo $count['COUNT(*)']; ?></span></span></p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div id="comments">
				
				
				<!--&lt;!&ndash; Blog entry &ndash;&gt;-->
				<!--<div class="w3-card-4 w3-margin w3-white">-->
				<!---->
				<!--<div class="w3-container">-->
				<!--<h5>Title description, <span class="w3-opacity">April 2, 2014</span></h5>-->
				<!--</div>-->
				<!---->
				<!--<div class="w3-container">-->
<!--				<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sed-->
<!--				tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>-->
				<!---->
				<!--</div>-->
				<!--</div>-->
			</div>
			<!-- END BLOG ENTRIES -->
		</div>
		
		<!-- Introduction menu -->
		<div class="w3-col l4">
			<!-- About Card -->
			<div class=" w3-margin w3-margin-top" style="position:center; text-align: center">
				<img src="icon.png" style="width:50%; ">
				<div class="w3-container w3-white">
					<h4><b>My Name</b></h4>
					<p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
				</div>
			</div><hr>
			
			
			
			<!-- END Introduction Menu -->
		</div>
		
		<!-- END GRID -->
	</div><br>
	
	<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">

</footer>

</body>
<script src="create account_app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
	
	
	
	var comments = document.getElementById("comments");
	function insertComment(user, date, msg){
		var div1 = document.createElement("div");
		div1.setAttribute("class", "w3-card-4 w3-margin w3-white");
		var div2 = document.createElement("div");
		div2.setAttribute("class", "w3-container");
		var h5 = document.createElement("h5");
		h5.innerText = user + ", ";
		var span = document.createElement("span");
		span.setAttribute("class", "w3-opacity");
		span.innerText = date;
		h5.appendChild(span);
		div2.appendChild(h5);
		var div3 = document.createElement("div");
		div3.setAttribute("class", "w3-container");
		var p1 = document.createElement("p");
		p1.innerHTML = msg;
		div3.appendChild(p1);
		div1.append(div2, div3);
		comments.appendChild(div1);
	}
	
	var replies = <?php echo json_encode($result_array); ?>;
	
	for(var i = 0; i < replies.length; i++){
		insertComment(replies[i]['By_ID'], replies[i]['Date'], replies[i]['Details']);
	}
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "300px";
	}
	
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>
</html>