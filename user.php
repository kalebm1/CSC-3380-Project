<?php

/*
This PHP page is to build out the user page based on the user id and name of
the user that is being viewed to build out the page accordingly. It also
gets the user's playlist to display a playlist and the play functions. There is
the social media integration for twitter that is made in the twitterbutton 
js and the follow button that allows a listener to either follow or unfollow a 
host. This page is the component that implements the factory method design pattern
because it builds the webpage based on the user id and the data it gets from the 
user's database inputs. The entire webpage, the music player, the host's username, the
playlist list and the function to add or remove songs is all built through the use of
the provided id and name from the URL. This is why it fits the factory method design
pattern.
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

<?php
$name = $_GET["name"];
$id = $_GET["id"];
$role;

if($_SESSION["username"]==$name){
    $role="host";
}else{
    $role="listener";
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	<title></title>
	<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.3/howler.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script src="js/songtest.js"></script>
</head>

<body>

	<div class='text'>
		<a class = "text" href="index.html">WeVibe</a>
	</div>
	<div id="role"><?php echo $role; ?></div>
	<div class = "user-profile">
		<div class='user-info-image'>
			<img src="user-image.png" alt="User_Image">
		</div>
		<div class = "host-info">
			<div id="name"><?php echo $name;?></div>
		</div>
		<div class = "follow">
		    <?php
           require_once "config.php";
            
            $sql = "SELECT favs.hostid, users.username FROM users INNER JOIN favs ON users.id=favs.hostid WHERE favs.userid=".$_SESSION["id"]." AND favs.hostid=".$id;
            $result = $link->query($sql);
            
            if ($result->num_rows > 0) {
                
                echo "<a  href='follow-flipper.php?id=".$id."&name=".$name."'><img id = 'follow' src='unfollow_button.png'></a>";
            } else {
                echo "<a  href='follow-flipper.php?id=".$id."&name=".$name."'><img id = 'follow' src='follow_button.png'></a>";
            }
?>
		</div>
	</div>
	<div id="tweet-container"></div>
	<?php 
	require_once "config.php";
	$songlist="";
	$sql = "SELECT * FROM playlist WHERE userid=".$id;
                $result = $link->query($sql);
                echo "<div class='song_list'>";
                echo "<h1> Songs in playlist: </h1>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='indiv_songs'>";
                      if($songlist!=""){
                          $songlist=$songlist.",";
                      } 
                      $songlist=$songlist."'".$row["url"]."'";
                    
                    
    			echo $row["songname"]."<br>".$row["artist"]."<br>";
    			if($id==$_SESSION["id"]){
    			    echo "<a id = 'controls' href='delete-song.php?id=".$row["id"]."'> DELETE SONG FROM LIST </a><br>";
    			}else{
    			    echo "<a id = 'controls' href='add-to-playlist.php?id=".$row["songid"]."&uri=".$row["url"]."&artist=".$row["artist"]."&songname=".$row["songname"]."'> ADD TO MY PLAYLIST </a><br>";
    			}
                             echo "	</div>";	
                    }
                    echo "	</div>";
                } else {
                    echo "0 results";
                }
	?>

<div id="song_here" <?php if($songlist==""){echo "style='visibility: hidden'";}?>>
	    <button id='howler-play'>Play</button>
    <button id='howler-pause'>Pause</button>
    <button id='howler-stop'>Stop</button>
    <button id='howler-volup'>Vol+</button>
    <button id='howler-voldown'>Vol-</button>
	</div>
	
	<?php
	    echo "<script> buildSong(".$songlist.");</script>";
	    ?>
	




<script src="js/twitterbutton.js"></script>




		<a class ="live" href="song_search.php"><i class="fa fa-plus"></i></a>


		<a class ="search" href="host-search.php"><i class="fa fa-search"></i></a>

</body>
</html>
