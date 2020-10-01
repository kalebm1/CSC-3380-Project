<?php
/*
This PHP page is used to delete songs from the playlist. It does this by first
searching for the song in the database using the unique playlist ID, and then
it deletes the song using that ID. It then redirects the user back to their 
updated user page with the updated playlist showing.
*/
?>

<html>
    <body>
        
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$id = $_GET["id"];
?>
	
		    <?php
           require_once "config.php";
            
                
               $sqldelete = "DELETE FROM playlist WHERE id = ".$id;
               $link->query($sqldelete);
               
            
            header("Location: http://makwd.us/project/user.php?id=".$_SESSION["id"]."&name=".$_SESSION["username"]);
            exit;
            
             
?>


</body>
</html>
