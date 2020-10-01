<?php
/*
This PHP page holds the credentials needed to access the database tables to
store and get data.
*/
?>


<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'wdwrevie_project_user');
define('DB_PASSWORD', 'TeamWevibe2020');
define('DB_NAME', 'wdwrevie_project');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>