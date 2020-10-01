<?php
/*
This PHP page takes the inputted information sent from the host-search page and
searches through the database to find if any user matches the search criterea. 
If there are, it sends that information back to the host-search page to display
the search results.
*/
?>

<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'wdwrevie_project');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'wdwrevie_project_user');
define('DB_PASSWORD', 'TeamWevibe2020');


try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false ]
  );
} catch (Exception $ex) {
  die($ex->getMessage());
}


$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` LIKE ?");
$stmt->execute(["%" . $_POST['search'] . "%"]);
$results = $stmt->fetchAll();
if (isset($_POST['ajax'])) { echo json_encode($results); }