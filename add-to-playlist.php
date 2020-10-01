<?php
/*
This PHP page is used to add songs into the playlist. It does this by checking
if the URL of the ReVibe song is valid and does not throw a 403 error. Then it
puts the song into the users playlist as an entry into the playlist table to be
used by the users' page.
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
$song_id = $_GET["id"];
$uri = $_GET["uri"];
$artist = $_GET["artist"];
$songname = $_GET["songname"];
?>


<?php
           require_once "config.php";
           
           $url = $uri;
           $file_headers = @get_headers($url);
           echo $file_headers[0];
           if(!$file_headers|| $file_headers[0] == 'HTTP/1.1 403 (Forbidden)'){
              header("Location: http://makwd.us/project/song_search.php");
            exit;
           }else{
               $sqladd = "INSERT INTO playlist (userid,songid,url,artist,songname) VALUES ( ".$_SESSION["id"].",'".$song_id."','".$uri."','".$artist."','".$songname."')";
               $link->query($sqladd);
                   
            
           header("Location: http://makwd.us/project/song_search.php");
            exit;
           }
            
             
            
            
             
?>
