<?php
/*
This PHP page is used to logout a user when they click the logout button. This
page destroys the session and returns the user to the login page where they 
can then either login or continue without being logged in.
*/
?>


<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>