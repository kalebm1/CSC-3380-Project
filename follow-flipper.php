<?php
/*
This PHP page is used to either add a follow from the current user to the host,
or remove a follow from the current user to the host. It does this by searching
through the favs table for a host id that matches the sent host id and a name 
that matches the sent name. If there is one already in the database it deletes
the entry from the database. If there is not an entry in the table, it adds an
entry with the correct information to the table. It then redirects the user back
to the host they were viewing with an updated button that reads either "follow"
or "unfollow".
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
$name = $_GET["name"];
?>
	
		    <?php
           require_once "config.php";
            
            $sql = "SELECT favs.hostid, users.username FROM users INNER JOIN favs ON users.id=favs.hostid WHERE favs.userid=".$_SESSION["id"]." AND favs.hostid=".$id;
            $result = $link->query($sql);
            
            if ($result->num_rows > 0) {
                
               $sqldelete = "DELETE FROM favs WHERE userid = ".$_SESSION["id"]." AND hostid = ".$id;
               $link->query($sqldelete);
               
            } else {
                $sqladd = "INSERT INTO favs (userid,hostid) VALUES ( ".$_SESSION["id"].",".$id.")";
               $link->query($sqladd);
                   
            }
            header("Location: http://makwd.us/project/user.php?id=".$id."&name=".$name);
            exit;
            
             
?>


</body>
</html>
