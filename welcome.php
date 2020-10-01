<?php
/*
This PHP page builds the home page of the website. It gives the users the 
option to login or to listen to the top 10 followed users on the site. If the 
user is already logged in, the page will display the users that the listener 
follow.
*/

?>




<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   echo"<a href='login.php'><div class='login_button'>
		login
	</div></a><br>";
}else{
   echo "<div class='page-header'>
        <h1>Hi, <b>".htmlspecialchars($_SESSION["username"])."</b>. Welcome to Wevibe.</h1>
    </div>
    <p>
        <a href='reset-password.php' class='btn btn-warning'>Reset Your Password</a>
        <a href='logout.php' class='btn btn-danger'>Sign Out of Your Account</a>
    </p>";
    
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Welcome</title>
    
</head>
<body>
    

    <div class='text'>
		<a href="index.html">WeVibe</a>
	</div>
    
    <p>
        <?php
           require_once "config.php";
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                
                $sql = "select hostid, username, count(hostid) from favs inner join users on favs.hostid = users.id group by hostid order by count(userid) DESC limit 10";
                $result = $link->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       
                    echo "<div class='image3'>";
    			echo"<a href='user.php?id=".$row["hostid"]."&name=".$row["username"]."'><img src='user-image.png' alt='User_Image'><br>";
    							echo"	 <div class='host-info'>". $row["username"]."<br>";
    							echo "</div>";
    							echo "</a>";
                            	echo "	</div>";
                    }
                } else {
                    echo "0 results";
                }
              
                
            }
            else
            {

                $sql = "SELECT favs.hostid, users.username FROM users INNER JOIN favs ON users.id=favs.hostid WHERE favs.userid=".$_SESSION["id"];
                $result = $link->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       
                    echo "<div class='image3'>";
    			echo"<a href='user.php?id=".$row["hostid"]."&name=".$row["username"]."'><img src='user-image.png' alt='User_Image'><br>";
    							echo"	 <div class='host-info'>". $row["username"]."<br>";
    							echo "</div>";
    							echo "</a>";
                            	echo "	</div>";
                    }
                } else {
                    echo "0 results";
                }
                               
            }

?>
<br>
<br>
<br>
<br>
  </p>
<div>
    
    <a class ="live" href="song_search.php"><i class="fa fa-plus"></i></a>
    
   <a class ="search" href="host-search.php"><i class="fa fa-search"></i></a>
</div>

 
  
</body>
</html>