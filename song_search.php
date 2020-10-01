

<?php
/*
This PHP page builds the search page for songs. It sends the user inputted data
to the search js function and then displays the songs that are found or an
error from the js function.
*/


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/songtest.js"></script>

	<title></title>
</head>
<body>

	<div class='text'>
		<a href="index.html">WeVibe</a>
	</div>


	<br>
	<br>
	<h2> Type in and choose a song to be added to your playlist!</h2><br>
	<div class='search-bar'>
		<input type="text" placeholder="Search.." name="search_value" id="search_value">
		<input type="button" class="btn" value="search" onclick="scrub_it();wack()"/>
	</div>
	<br>
	<div id="results"></div>
	
	
	<a class ="live" href="song_search.php"><i class="fa fa-plus"></i></a>


		<a class ="search" href="host-search.php"><i class="fa fa-search"></i></a>
</body>
</html>