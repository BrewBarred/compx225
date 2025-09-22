<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "1");
    ini_set("log_errors", "1");
    ini_set("error_log", "php_errors.log");
?>	

<?php
// db.php
// This file handles connecting to the MySQL database.
// Using require/include lets us avoid repeating connection code everywhere.

// Database credentials (adjust if different in your setup)
$host = "learn-mysql.cms.waikato.ac.nz";
$user = "eb324";
// /$password = "my408159sql";
$password = "my408159sql";
$dbname = "kiwi_kloset";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn == FALSE) {
    die("Error connecting to MYSQL server: " . mysqli_connect_error());
}
?>
