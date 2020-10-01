<?php
/*
This PHP page is used by users to discover other hosts on the platform. It
takes a user-inputted search term and sends the data to the search page. It then
takes the data sent back from the search page and displays the results. If there
are results from the search page, it displays the results to the user. If there
are no results, it returns No results found.
*/
?>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
/* [SEARCH FOR USERS] */
if (isset($_POST['search'])) {
  require "search.php";
}

/* [DISPLAY HTML] */ ?>
<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
  <body>
      <div class='text'>
		<a href="index.html">WeVibe</a>
	</div>
      
      <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to WeVibe.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
      <div class="search-wrapper">
    <!-- [SEARCH FORM] -->
    
    
    <div class='search-bar'>
    <form method="post" arction="host-search.php">
      <h4>SEARCH FOR USERS</h4><br><br>
      <input type="text" name="search" id="search_value" required/>
      <input class="btn" type="submit" value="Search"/><br>
    </form>
    </div>

    <!-- [SEARCH RESULTS] -->
    <?php
    echo "<div class='search_results'>";
    if (isset($_POST['search'])) {
      if (count($results) > 0) {
          echo "<div id='search-number'> Search found ".count($results)." users</div>";
        foreach ($results as $r) {
          printf("<div id='results'><a href='user.php?id=".$r["id"]."&name=".$r['username']."'>%s\n</a></div>", $r['username']);
         
        }
        echo "</div>";
      } else {
        echo "No results found";
      }
    }
    ?>
    </div>
  </body>
</html>